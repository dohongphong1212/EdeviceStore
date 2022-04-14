<div class="row mb footer" style="background-color: white;border: 0px;">
    <div style="width: 25%;">
        <h2 style="font-size: 28px;color: #da1818;    margin-bottom: 16px;">ISMART</h2>
        <p style="    font-family: 'Roboto Light';
    text-align: justify;
    color: #6d6d6d;
    margin-bottom: 25px;font-size: 16px;">ISMART luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
        <div>
            <img src="../view//images/img-foot.png" alt="">
        </div>
    </div>
    <div style="width: 25%;">
        <h2 style="    font-size: 20px;
    margin-bottom: 25px;color: black;    padding-left: 38px;">Thông tin cửa hàng</h2>
        <ul>
            <li style="    font-size: 16px;
    color: gray;    padding-right: 10px;"><i class="fa fa-phone"></i></li>
            <li style="    font-size: 16px;
    color: gray;">106 - Trần Bình - Cầu Giấy - Hà Nội</li>
        </ul>
        <ul>
            <li style="    font-size: 16px;
    color: gray;    padding-right: 10px;"><i class="fa fa-phone"></i></li>
            <li style="    font-size: 16px;
    color: gray;">0987.654.321 - 0989.989.989</li>
        </ul>
        <ul>
            <li style="    font-size: 16px;
    color: gray;    padding-right: 10px;"><i class="fa fa-phone"></i></li>
            <li style="    font-size: 16px;
    color: gray;">vshop@gmail.com</li>
        </ul>
    </div>
    <div style="width: 25%;">
        <h2 style="    font-size: 20px;
    margin-bottom: 25px;color: black;    padding-left: 38px;">Chính sách mua hàng</h2>
        <ul style="display: flex;flex-direction: column;">
            <li style="    font-size: 16px;
    color: gray;margin-bottom: 10px;">Quy định - chính sách</li>
            <li style="    font-size: 16px;
    color: gray;margin-bottom: 10px;">Chính sách bảo hành - đổi trả</li>
            <li style="    font-size: 16px;
    color: gray;margin-bottom: 10px;">Chính sách hội viện</li>
            <li style="    font-size: 16px;
    color: gray;margin-bottom: 10px;">Giao hàng - lắp đặt</li>
        </ul>
    </div>
    <div style="width: 25%;">
        <h2  style="    font-size: 20px;
    margin-bottom: 25px;color: black;">Bảng tin</h2>
        <p style="    font-size: 16px;
    color: gray;margin-bottom: 10px;">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
        <form action="" method="post">
            <input style="width: 100%;" type="text" placeholder="Nhập email tại đây">
            <button style="    width: 100%;
    background: #da1818;
    border: none;
    outline: none;
    padding: 10px 0px;
    text-transform: uppercase;
    color: #fff;
    font-family: 'Roboto Medium';
    line-height: normal;">Đăng ký tại đây</button>
        </form>
    </div>
</div>
<div class="row mb" style="background-color: #da1818;
    text-align: center;
    padding: 10px 0px;margin: 0px;">
            <p style="    color: #fff;
    line-height: normal;
    font-family: 'Roboto Light';font-size: 16px;">© Bản quyền thuộc về Ismart.com</p>
</div>
</div>
<!-- js slide -->
<script>
    var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 9000); // Change image every .. seconds
    }

    
</script>

</body>

</html>