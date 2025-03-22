<?= $this->extend('layout/main1') ?>


<?= $this->section('content') ?>

<!-- contact -->
<section class="contact-us" id="contact">
    <div>
        <iframe class="container-maps"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.224739896435!2d111.35501457465816!3d-7.871536492150621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e799dca43b011bd%3A0xa7f7358a14015352!2sSLB%20Negeri%20Badegan!5e0!3m2!1sid!2sid!4v1691151796413!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
    <div class="container-call">
        <div class="row">
            <div class="col-lg-3">
                <div class="right-info">
                    <ul>
                        <li>
                            <p>Phone Number<br>
                                <span> 010-020-0340</span>
                            </p>
                        </li>
                        <li>
                            <p>Email Address<br>
                                <span>slbnbadeganponorogo.sch.id</span>
                            </p>
                        </li>
                        <li>
                            <p>Street Address<br>
                                <span>Rio de Janeiro - RJ, 22795-008, Brazil</span>
                            </p>
                        </li>
                        <li>
                            <p>Website URL<br>
                                <span> slbnbadeganponorogo.sch.id</span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</section>
<div class="row py-4 justify-content-center mt-3" style="padding: 6px 480px;">
    <div class="col-md-4">
        <div id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function () { // DON'T EDIT BELOW THIS LINE
                var d = document,
                    s = d.createElement('script');
                s.src = 'https://pkks2023.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                powered by Disqus.</a></noscript>

    </div>
</div>
<?= $this->endsection() ?>