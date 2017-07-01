                 
                    @if (Auth::check())

                      <p>We’ve been testing this with you for weeks, and it looks like you've already set up an account! Help us prioritize what we build out next by filling out <a href="https://docs.google.com/forms/d/e/1FAIpQLScm1loRwBKA9TJdUQdl67ZMA0e-Lc_C3Qm9dU0sQ5FBC7BtMA/viewform" target="_blank">this short survey</a> (5 minutes).</p>

                    @else
                      
                      <p>We’ve been testing this with you for weeks, so many of you have already set up an <a href="/login">account</a>. If you haven’t set up an account yet, all you need to do is enter your email, zip code, and a password at the link below.</p>

                      <p align="center"><a class="btn btn-cta btn-cta-body" href="/signup">Sign Up Now</a></p>
 
                      <p>Once you’ve <a href="/signup">signed up</a> or <a href="/login">logged in</a>, help us prioritize what we build out next by filling out <a href="https://docs.google.com/forms/d/e/1FAIpQLScm1loRwBKA9TJdUQdl67ZMA0e-Lc_C3Qm9dU0sQ5FBC7BtMA/viewform" target="_blank">this short survey</a> (5 minutes).</p>

                    @endif
                            
