<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

use App\Models\RoleModel as RoleModel;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fieldSearchAccepted = [
        'id', 'name','email', 'role_id'
    ];
    protected $crudNotAccepted = [
        '_token', 'avatar_current', 'password_confirmation', 'task'
    ];

    public function role(){
        return $this->belongsTo('App\Models\RoleModel', 'role_id');
    }

    public function listItems($params, $option){
        $roleModel = new RoleModel();
        $result = null;
        if($option['task'] == 'admin-list-items'){
            $query = $this->select('id', 'name', 'email', 'avatar', 'role_id', 'status', 'created_at', 'updated_at');
            
            if($params['filter']['status'] != 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }

            if($params['search']['value'] != ''){   
                if($params['search']['field'] == 'all'){
                    $query->where(function($query) use($params, $roleModel){
                        foreach($this->fieldSearchAccepted as $column){
                            if($column == 'role_id'){
                                // Xu ly truong hop search by subject
                                $role_id = $subjectModel->getItem($params, ['task' => 'get-role_id-by-name']);
                                $query->orWhere($column, $role_id['type']);
                            }else{
                                // field search con lai
                                $query->orWhere($column, 'like', "%{$params['search']['value']}%");
                            }
                        } 
                    });
                }elseif($params['search']['field'] == 'role_id'){
                    $role_id = $roleModel->getItem($params, ['task' => 'get-role_id-by-name']);
                    $query->where($params['search']['field'], $role_id['type']);
                }else{
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }
            $result = $query->orderBy('id', 'asc')
                            ->paginate($params['pagination']['totalItemPerPage']);
            
        }
        return $result;

    }

    public function saveItem($params = null, $option = null){
        // Chuc nang thay doi status
        if($option['task'] == 'change-status'){
            $status = ($params['currentStatus'] == 'active') ? 'inactive' : 'active';
            self::where('id', $params['id'])
                ->update(['status' => $status]);
        }
        // Chuc nang add
        if($option['task'] == 'add-item'){
            $thumb = $params['avatar'];
            $params['avatar'] = Str::random(10) . '.' . $thumb->clientExtension();
            $thumb->storeAs('user', $params['avatar'], 'images_public');
            $params['password'] = md5($params['password']);

            $params = array_diff_key($params, array_flip($this->crudNotAccepted));
            self::insert($params);
        }
        // Chuc nang edit
        if($option['task'] == 'edit-item'){
            // Upload new image
            if(!empty($params['avatar'])){
                Storage::disk('images_public')->delete('user/' . $params['avatar_current']);
                $thumb = $params['avatar'];
                $params['avatar'] = Str::random(10) . '.' . $thumb->clientExtension();
                $thumb->storeAs('user', $params['avatar'], 'images_public');
            }
            // Don't upload new image
            $params = array_diff_key($params, array_flip($this->crudNotAccepted));
            self::where('id', $params['id'])->update($params);
        }

        if($option['task'] == 'change-level-user'){
            $role_id = $params['role_id'];
            self::where('id', $params['id'])->update(['role_id' => $role_id]);
        }

        if($option['task'] == 'change-password'){
            $params['password'] = md5($params['password']);
            self::where('id', $params['id'])->update(['password' => $params['password']]);
        }

        if($option['task'] == 'register-user'){
            $this->name = $params['name'];
            $this->email = $params['email'];
            $this->password = md5($params['password']);
            $this->role_id = 2;
            $this->avatar = '人を信じる.jpg';
            $this->status = 'active';
            $this->save();
        }
    }

    public function deleteItem($params = null, $option = null){
        if($option['task'] = 'delete-item'){
            $item = self::getItem($params, ['task' => 'get-thumb']);
            Storage::disk('images_public')->delete('user/' . $item['thumb']);
            self::where('id', $params['id'])
                ->delete();
        }
    }

    public function getItem($params = null, $option = null){
        $result = null;
        if($option['task'] == 'get-item'){
            $result = self::select('id', 'name', 'email', 'avatar', 'role_id', 'status', 'password')->where('id', $params['id'])->first();
        }
        if($option['task'] == 'get-thumb'){
            $result = self::select('id', 'avatar')->where('id', $params['id'])->first();
        }

        if($option['task'] == 'auth-login'){
            $result = self::select('id', 'name', 'email', 'avatar', 'role_id', 'status', 'password')
            ->where('email', $params['email'])
            ->where('password', md5($params['password']))->first();
        }
        return $result;
    }

    // FIXME: Count items when search by all and search by subject
    public function countItems($params, $option){
        $result = null;
        if($option['task'] == 'admin-count-items-group-by-status'){
            $query = self::select(DB::raw('count(id) as count, status'))
                                    // ->where('id', '>', 3)
                                    ->groupBy('status');

            if($params['search']['value'] != ''){
                if($params['search']['field'] == 'all'){
                    $query->where(function($query) use($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'like', "%{$params['search']['value']}%");
                        } 
                    });
                }else{
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }
            $result = $query->get()
                            ->toArray();   
        }
        return $result;
    }
    
}
