<template>
  <section id="contact" className="contact">
    <div className="container" data-aos="fade-up">
      <div className="section-title">
        <h2>Contact</h2>
        <p>If you want to contact us, drop us a message down bellow.</p>
      </div>

      <div className="row">
        <div className="col-lg-5 d-flex align-items-stretch">
          <div className="info">
            <div className="address">
              <i className="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>bul. Iztochen, Plovdiv, Bulgaria</p>
            </div>

            <div className="email">
              <i className="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>contact@takerman.net</p>
            </div>

            <div className="phone">
              <i className="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+447383721742</p>
            </div>

            <!-- <iframe
              title="Map"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2958.134073389703!2d24.760884815327426!3d42.14741767920169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14acd10ab6558be7%3A0x8b8db75788fb7b4c!2s862%20101%2C%204000%20Tsentar%2C%20Plovdiv!5e0!3m2!1sen!2sbg!4v1662315803570!5m2!1sen!2sbg"
              frameBorder="0"
              style="border: 0, width: '100%' , height: '290px'"
              allowFullScreen
              loading="lazy"
              referrerPolicy="no-referrer-when-downgrade"
            ></iframe> -->
          </div>
        </div>

        <div className="col-lg-7 mt-5 mt-lg-0 align-items-stretch">
          <form action="#" className="php-email-form">
            <div className="row">
              <div className="form-group col-md-6">
                <label htmlFor="name">Your Name</label>
                <input className="form-control" id="name" required />
              </div>
              <div className="form-group col-md-6">
                <label htmlFor="name">Your Email</label>
                <input
                  className="form-control"
                  name="email"
                  id="email"
                  required
                />
              </div>
              <div className="form-group">
                <label htmlFor="name">Subject</label>
                <input className="form-control" name="subject" id="subject" />
              </div>
              <div className="form-group">
                <label htmlFor="name">Message</label>
                <textarea
                  className="form-control"
                  name="message"
                  id="message"
                  rows="10"
                />
              </div>
              <div className="my-3">
                <div className="loading">Loading</div>
                <div className="error-message"></div>
                <div
                  className="sent-message"
                  style="display: isSent ? 'block' : 'none'"
                >
                  Your message has been sent. Thank you!
                </div>
              </div>
              <div className="text-center">
                <button type="button" onclick="{sendMessageAsync}">
                  Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
