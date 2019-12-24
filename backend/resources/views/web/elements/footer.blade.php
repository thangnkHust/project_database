@php
    use App\Models\PostModel as PostModel;
    use App\Helpers\URL as URL;

    $postModel = new PostModel();
    $itemsPost = $postModel->listItems(null, ['task' => 'front-end-news-list-items']);

    $listPost = '';
    foreach ($itemsPost as $item) {
        $linkPost = URL::linkPostDetail($item->subject->id, $item->subject->name, $item['id'], $item['name']);
        $date = date(config('test.format.short_time'), strtotime($item['updated_at']));
        $listPost .= sprintf(
            '<div class="f-blog">
                <a href="%s" class="blog-img" style="background-image: url(%s);">
                </a>
                <div class="desc">
                    <h2>
                        <a href="%s">%s</a>
                    </h2>
                    <p class="admin">
                        <span>%s</span>
                    </p>
                </div>
            </div>', $linkPost, asset('images/post/' . $item['thumb']), $linkPost, $item['name'], $date
        );
    }
@endphp

<div class="container">
    <div class="row row-pb-md">
        <div class="col-md-3 colorlib-widget">
            <h4>Giới thiệu trang Web</h4>
            <p>Đây là trang web về học và thi thử online cho học sinh lớp 12. Gồm những môn học Toán,
                Vật lý, Hóa học, Sinh học, Lịch sử, Địa lý, Tiếng Anh, Tiếng Nhật... </p>
            <p>
                <ul class="colorlib-social-icons">
                    <li>
                        <a href="#">
                            <i class="icon-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/thangfighting" target=”_blank”>
                            <i class="icon-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-dribbble"></i>
                        </a>
                    </li>
                </ul>
            </p>
        </div>
        <div class="col-md-3 colorlib-widget">
            <h4>Quick Links</h4>
            <p>
                <ul class="colorlib-footer-links">
                    <li>
                        <a href="{{route('home')}}">
                            <i class="icon-check"></i> Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{route('news')}}">
                            <i class="icon-check"></i>Bài viết mới</a>
                    </li>
                    <li>
                        <a href="about.html">
                            <i class="icon-check"></i> Về chúng tôi</a>
                    </li>
                    <li>
                        <a href="contact.html">
                            <i class="icon-check"></i> Liên hệ</a>
                    </li>
                </ul>
            </p>
        </div>

        <div class="col-md-3 colorlib-widget">
            <h4>Bài viết mới</h4>
            {!!$listPost!!}
        </div>

        <div class="col-md-3 colorlib-widget">
            <h4>Thông tin liên hệ</h4>
            <ul class="colorlib-footer-links">
                <li>Số 1 Đại Cồ Việt,
                    <br>Quận Hai Bà Trưng, Hà Nội</li>
                <li>
                    <a href="tel://0344695724">
                        <i class="icon-phone"></i> 0982.999.999</a>
                </li>
                <li>
                    <a href="mailto:info@yoursite.com">
                        <i class="icon-envelope"></i> info@yoursite.com</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-location4"></i> study.com</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="copy">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block">&copy;
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved
                        <!-- <i class="icon-heart" aria-hidden="true"></i> -->by
                        <a href="https://colorlib.com" target="_blank">Thang and Thuc</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </small>
                    <br>
                    <!-- <small class="block">Demo Images:
                        <a href="http://unsplash.co/" target="_blank">Unsplash</a>,
                        <a href="http://pexels.com/" target="_blank">Pexels</a>
                    </small> -->
                </p>
            </div>
        </div>
    </div>
</div>