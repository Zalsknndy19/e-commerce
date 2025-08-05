// Mobile Nav toggle
// =======================
// DOM Ready (vanilla JS)
// =======================
document.addEventListener("DOMContentLoaded", function () {
  // Toggle Sidebar Mobile Nav
  const sidebar = document.getElementById("responsive-nav");
  const overlay = document.getElementById("overlay");
  const toggleSidebarBtn = document.querySelector(".menu-toggle"); // optional

  if (sidebar && overlay) {
    window.toggleSidebar = function () {
      sidebar.classList.toggle("active");
      overlay.classList.toggle("active");
    };
  }

  // Expand/Lihat Semua Produk
  document.querySelectorAll('.lihat-semua').forEach(function(tombol) {
    tombol.addEventListener('click', function() {
      const parent = tombol.closest('div').parentElement; // ambil pembungkus div luar
      const konten = parent.querySelector('.produk-sisa');
      konten.style.maxHeight = konten.style.maxHeight ? null : konten.scrollHeight + 'px';
      tombol.textContent = konten.style.maxHeight ? 'Sembunyikan Produk' : 'Lihat Semua Produk';
    });
  });
  
  
});

// Products Slick
$('.prod-slick').each(function() {
	var $this = $(this),
	$nav = $this.attr('data-nav');
	$this.slick({
	  slidesToShow: 2,
		slidesToScroll: 1,
		autoplay: true,
		infinite: true,
		speed: 1000,
		dots: false,
		arrows: true,
		appendArrows: $nav ? $nav : false,
	});
});

	/////////////////////////////////////////

	// Product Main img Slick
	$('#prod-main-img').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#prod-imgs',
  });

	// Product imgs Slick
  $('#prod-imgs').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
		centerPadding: 0,
		vertical: true,
    asNavFor: '#prod-main-img',
		responsive: [{
        breakpoint: 991,
        settings: {
					vertical: false,
					arrows: false,
					dots: true,
        }
      },
    ]
  });

	// Product img zoom
	var zoomMainProduct = document.getElementById('prod-main-img');
	if (zoomMainProduct) {
		$('#prod-main-img .prod-preview').zoom();
	}

	/////////////////////////////////////////
/*
** With Slick Slider Plugin : https://github.com/marvinhuebner/slick-animation
** And Slick Animation Plugin : https://github.com/marvinhuebner/slick-animation
*/

// Init Hero Slide
$('.hero-slide').slick({
  autoplay: true,
  autoplaySpeed: 7000,
  fade: true,
  arrows: false,
  dots: true,
  speed: 700,
  adaptiveHeight: false,
  cssEase: 'ease-in-out'
});

