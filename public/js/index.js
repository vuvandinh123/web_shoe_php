
const backToTopBtn = document.querySelector(".backto-top");

window.addEventListener("scroll", () => {
  if (window.scrollY > 750) {
    backToTopBtn.classList.add("show");
  } else {
    backToTopBtn.classList.remove("show");
  }
});

function backToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}

$('.image-brand').slick({
  // dots: true,
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  variableWidth: true
});

function hanldleclick(){
  $('.detail-item').removeClass('details-active')
  $(this).addClass('details-active');
}
$('.detail-item').click(hanldleclick)



//  TAB LINK


$('.tab-link').click(function(e){
  let index= $('.tab-link').index(this)+1

  $('.tab-link').removeClass('active-tab')
  $(this).addClass('active-tab')
  if(index==1){
      let html=``
      $('.tab-content').html(html);
  }
  else if(index==2){
      let html=`<h1>Thương hiệu </h1>`
      $('.tab-content').html(html);
  }
  else{
      let html=`<h1>Đánh giá </h1>`
      $('.tab-content').html(html);
  }
})

//  so luong product

$('.minus').click(function(){
  let soLuong= Number($(this).siblings('.quantity').val())
  if(soLuong>1){
      soLuong-=1;
      $(this).siblings('.quantity').val(soLuong)
  }
  let tong=price(340000,soLuong)
  $('.total-product').html(formattedPrice(tong))
})
$('.plus').click(function(){
  let soLuong= Number($(this).siblings('.quantity').val())
  soLuong+=1;
  $(this).siblings('.quantity').val(soLuong)
  let tong=price(340000,soLuong)
  $('.total-product').html(formattedPrice(tong))
})
function formattedPrice(format){
  const formattedPrice = format.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
  return formattedPrice
}
function price(priceProduct,quantity){
  return priceProduct*quantity;
}
// next prev silder
$('.slick-next').html('<i class="fa-solid fa-angle-right fs-2 link-hover"></i>')
$('.slick-prev').html('<i class="fa-solid fa-angle-left fs-2 link-hover"></i>')




$('.btn-mb').click(()=>{

  $('.nav').addClass('active')
  $('.nav-1 ul').addClass('active')
  if($('.nav').hasClass('active')){
    document.addEventListener("click", function(event) {
      if (!$('.nav-1 ul')[0].contains(event.target)&&!$('.btn-mb')[0].contains(event.target)) {
          $('.nav').removeClass("active");
      $('.nav-1 ul').removeClass('active')

      }
      
    });
  }
  
})

$('.i-drop').click(()=>{
  $('.nav-item-hover1').toggleClass('active-down')
})
$('#acc').click(()=>{
  $('.usersiter').toggleClass('show_user')
  if($('.usersiter').hasClass('show_user'))
    document.addEventListener('click',function(e){
      if (!$('.show_user')[0].contains(e.target)&&!$('#acc')[0].contains(e.target)) {
          $('.usersiter').removeClass("show_user");
        $('.nav-1 ul').removeClass('active')

    }
  })
})
