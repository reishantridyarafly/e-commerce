 <!-- footer start -->
 <footer class="footer footer__style-two black-bg">
     <div class="container mxw_1530">
         <div class="footer__main pt-90 pb-90">
             <div class="row mt-none-40">
                 <div class="footer__widget col-lg-4 col-md-6 mt-40">
                     <div class="footer__logo mb-20">
                         <a href="index.html"><img src="{{ asset('frontend/assets') }}/img/logo.png" style="height: 80px"
                                 alt=""></a>
                     </div>
                     <p>Jln. Mohamad Toha No. 11, Kasturi - Kuningan, Rest Area Cirendang (Depan Kantor BPJS
                         Kuningan)</p>
                     <ul class="footer__info mt-30">
                         <li><i class="fas fa-phone"></i>0852-2400-4888</li>
                     </ul>
                 </div>
                 <div class="footer__widget col-lg-4 col-md-6 mt-40">
                     <h2 class="title">Katalog</h2>
                     <ul class="quick-links">
                         <li><a href="#!">Laptops & Computers</a></li>
                         <li><a href="#!">Cameras & Photography</a></li>
                         <li><a href="#!">Smart Phones & Tablets</a></li>
                         <li><a href="#!">Video Games & Consoles</a></li>
                         <li><a href="#!">TV & Audio</a></li>
                         <li><a href="#!">Gadgets</a></li>
                         <li><a href="#!">Waterproof Headphones</a></li>
                     </ul>
                 </div>

                 <div class="footer__widget col-lg-4 col-md-6 mt-40">
                     <h2 class="title">Menu</h2>
                     <ul class="quick-links">
                         <li><a href="{{ route('beranda.index') }}">Beranda</a></li>
                         <li><a href="{{ route('tentang.index') }}">Tentang</a></li>
                         <li><a href="{{ route('belanja.index') }}">Belanja</a></li>
                         <li><a href="{{ route('kontak.index') }}">Kontak</a></li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="footer__bottom d-flex justify-content-between align-items-center">
             <div class="footer__copyright">
                 <small>
                     <script>
                         document.write(new Date().getFullYear())
                     </script> © {{ config('app.name') }} - by <b>Rio Akbar Turmuzi</b>
                 </small>
             </div>
         </div>
     </div>
 </footer>
 <!-- footer end -->
