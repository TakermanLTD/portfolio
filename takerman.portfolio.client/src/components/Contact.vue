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
                            <h4>City:</h4>
                            <p>Plovdiv, Bulgaria</p>
                        </div>

                        <div className="email">
                            <i className="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p><a href="mailto:contact@takerman.net">contact@takerman.net</a></p>
                        </div>

                        <div className="phone">
                            <i className="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p><a href="tel:+447383721742">+447383721742</a></p>
                            <p><a href="tel:+359894834513">+359894834513</a></p>
                        </div>
                    </div>
                </div>

                <div className="col-lg-7 mt-5 mt-lg-0 align-items-stretch">
                    <div id="contactForm" v-once></div>
                    <form action="#" className="php-email-form" @submit="sendMessage">
                        <div className="row">
                            <div className="form-group col-md-6">
                                <label htmlFor="name">Your Name</label>
                                <input className="form-control" id="name" v-model="name" required />
                            </div>
                            <div className="form-group col-md-6">
                                <label htmlFor="name">Your Email</label>
                                <input className="form-control" name="email" id="email" v-model="email" required />
                            </div>
                            <div className="form-group">
                                <label htmlFor="name">Subject</label>
                                <input className="form-control" name="subject" v-model="subject" id="subject" />
                            </div>
                            <div className="form-group">
                                <label htmlFor="name">Message</label>
                                <textarea className="form-control" name="message" id="message" v-model="message" rows="10"></textarea>
                            </div>
                            <div className="my-3">
                                <div v-show="this.loading" className="loading">Loading...</div>
                                <div v-show="this.status != null" :class="this.statusClass">{{ this.status }}</div>
                                <br />
                                <div className="text-center">
                                    <button type="submit">
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
<script>
export default {
    data() {
        return {
            loading: false,
            statusClass: 'sent-message',
            status: null,
            name: '',
            email: '',
            subject: '',
            message: ''
        }
    },
    methods: {
        async sendMessage(e) {
            e.stopPropagation();
            e.preventDefault();

            if (!this.name || !this.email || !this.message) {
                alert('Please enter email, name and message');
                return;
            }

            this.loading = true;
            const data = {
                Subject: this.subject,
                From: this.email,
                Body: this.name + ' with email ' + this.email + ' sent you a message: <br /><br />' + this.message,
                To: 'tivanov@takerman.net'
            }
            await fetch('home/sendMessage', {
                method: 'POST',
                headers: {
                    Accept: 'application.json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data),
                cache: 'default'
            }).then((result) => {
                this.loading = false;
                this.statusClass = "sent-message";
                this.status = 'Your message has been sent. Thank you!';
            }).catch((error) => {
                this.loading = false;
                this.statusClass = "error-message";
                this.status = 'There was an error while sending the message! Apologies. Please use the email.';
            });
        }
    },
}
</script>