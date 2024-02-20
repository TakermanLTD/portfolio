<script>
export default {
    data() {
        return {
            loading: false,
            statusClass: 'sent-message',
            status: null
        }
    },
    methods: {
        async sendMessage() {
            this.loading = true;
            const message = {
                Subject: document.getElementById('subject').value,
                From: document.getElementById('email').value,
                Body: document.getElementById('name').value + ' sent you a message: ' + document.getElementById('message').value,
                To: 'tivanov@takerman.net'
            }
            await fetch('home/sendMessage', {
                method: 'POST',
                headers: {
                    Accept: 'application.json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(message),
                cache: 'default'
            }).then((result) => {
                debugger;
                this.loading = false;
                this.statusClass = "sent-message";
                this.status = 'Your message has been sent. Thank you!';
            }).catch((error) => {
                debugger;
                this.loading = false;
                this.statusClass = "error-message";
                this.status = 'There was an error while sending the message! Apologies. Please use the email.';
            });
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
                                <div v-show="this.loading" className="loading">Loading...</div>
                                <div v-show="this.status != null" :class="this.statusClass">{{ this.status }}</div>
                            <br />
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
