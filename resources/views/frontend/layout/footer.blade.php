<div class="footer-dark">
    <footer>
        <div class="container-fluid">
            <div class="row" style="font-family: Raleway, sans-serif;">
                <div class="col-md-3 offset-md-1 item">
                    <h3>Links</h3>
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="{{ route('login') }}">Sign in</a></li>
                    </ul>
                </div>
                <div class="col-md-7 item text">
                    <h3>About Staff<span style="color: rgb(86,198,198);">appraisal</span></h3>
                    <p style="text-align:justify">
                        Appraisal is the foundation on which Staff promotion is built. Appraisal reveals the 
                        efforts and contributions which each Staff in an organization has been making over a 
                        specified period of time. This platform ensures that Staff send in the required 
                        criteria upon which they can be assessed accordingly by the Constituted Authorities 
                        within the Organization.
                    </p>
                </div>
                <div class="col-md-10 offset-md-1 item social">
                    <a href="#"><i class="icon ion-social-facebook"></i></a>
                    <a href="#"><i class="icon ion-social-twitter"></i></a>
                    {{-- <a href="#"><i class="icon ion-social-snapchat"></i></a>
                    <a href="#"><i class="icon ion-social-instagram"></i></a> --}}
                </div>
            </div>
            <p class="copyright">staffappraisal.org © 2020 - 2021</p>
        </div>
    </footer>
</div>
<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>