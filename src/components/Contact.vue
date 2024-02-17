<script>
import { Connection } from 'rabbitmq-client'

export default {
  data: {
    rabbit: null,
    isSent: false
  },
  mounted() {
    this.rabbit = new Connection('amqp://takerman:Hakerman91!@192.168.1.3.net:5672')
    this.rabbit.on('error', (err) => {
      console.log('RabbitMQ connection error', err)
    })
    this.rabbit.on('connection', () => {
      console.log('Connection successfully (re)established')
    });
  },
  methods: {
    sendMessage() {
      const pub = rabbit.createPublisher({
        confirm: true,
        maxAttempts: 2
      });

      const message = {
        subject: document.getElementById('subject'),
        name: document.getElementById('name'),
        email: document.getElementById('email'),
        message: document.getElementById('message')
      }

      await pub.send('mail', message)
    }
  },
}
</script>
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
          </div>
        </div>

        <div className="col-lg-7 mt-5 mt-lg-0 align-items-stretch">
          <div id="contactForm" v-once></div>
          <form action="#" className="php-email-form">
            <div className="row">
              <div className="form-group col-md-6">
                <label htmlFor="name">Your Name</label>
                <input className="form-control" id="name" required />
              </div>
              <div className="form-group col-md-6">
                <label htmlFor="name">Your Email</label>
                <input className="form-control" name="email" id="email" required />
              </div>
              <div className="form-group">
                <label htmlFor="name">Subject</label>
                <input className="form-control" name="subject" id="subject" />
              </div>
              <div className="form-group">
                <label htmlFor="name">Message</label>
                <textarea className="form-control" name="message" id="message" rows="10"></textarea>
              </div>
              <div className="my-3">
                <div className="loading">Loading</div>
                <div className="error-message"></div>
                <div className="sent-message">
                  <div className="sent-message" style="display: isSent ? 'block' : 'none'">
                    Your message has been sent. Thank you!
                  </div>
                </div>
                <div className="text-center">
                  <button type="button" @click="sendMessage">
                    Send Message
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
