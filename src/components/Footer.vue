<script>
export default {
  mounted() {
    const script = document.createElement("script");
    script.src = "https://js-eu1.hsforms.net/forms/embed/v2.js";
    document.body.appendChild(script);
    script.addEventListener("load", () => {
      if (window.hbspt) {
        window.hbspt.forms.create({
          region: "eu1",
          portalId: "25912911",
          formId: "030e6043-546d-4c13-bf36-6fd2d9a03745",
          target: "#newsletterForm"
        })
      }
    })
  }
}
</script>


<template>
  <footer id="footer">
    <div className="footer-newsletter">
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Enter your email</p>
            <div id="newsletterForm" v-once></div>
            <!-- <form action="" method="post">
              <input type="email" name="email" /><input type="submit" value="Subscribe" />
            </form> -->
          </div>
        </div>
      </div>
    </div>

    <div className="footer-top">
      <div className="container">
        <div className="row">
          <div className="col-lg-3 col-md-6 footer-contact">
            <h3>Takerman</h3>
            <p>
              bul. Iztochen <br />
              Plovdiv 4000,<br />
              Bulgaria <br />
              <strong>Phone:</strong> +447383721742<br />
              <strong>Email:</strong> contact@takerman.net<br />
            </p>
          </div>

          <div className="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i className="bx bx-chevron-right"></i> <a href="#home">Home</a>
              </li>
              <li>
                <i className="bx bx-chevron-right"></i>
                <a href="#about">About us</a>
              </li>
              <li>
                <i className="bx bx-chevron-right"></i>
                <a href="#services">Services</a>
              </li>
            </ul>
          </div>

          <div className="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li>
                <i className="bx bx-chevron-right"></i>
                <a href="#development">Software Development</a>
              </li>
              <li>
                <i className="bx bx-chevron-right"></i>
                <a href="#testing">Testing and Optimisation</a>
              </li>
              <li>
                <i className="bx bx-chevron-right"></i>
                <a href="#delivery">Delivery</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div className="container footer-bottom clearfix">
      <div className="copyright">
        &copy; Copyright <strong><span>Takerman</span></strong>. All Rights Reserved
      </div>
      <div className="credits"></div>
    </div>
  </footer>
</template>
