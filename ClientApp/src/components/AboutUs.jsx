import React from "react";

export default function AboutUs() {
  return (
    <section id="about" className="about">
      <div className="container" data-aos="fade-up">

        <div className="section-title">
          <h2>About Us</h2>
        </div>

        <div className="row content">
          <div className="col-lg-6">
            <p>
              Our expertese has more than 10 years of experience of software development and planing.
              We discuss in details the project requirements and then plan it with care.
              The development and delivery phase are an enjoyable task for our professionals.
            </p>
            <ul>
              <li><i className="ri-check-double-line"></i> Project discussions, planing and preparing</li>
              <li><i className="ri-check-double-line"></i> Development, testing and optimisation</li>
              <li><i className="ri-check-double-line"></i> Delivery ot self-hosted or third-party infsrastructure</li>
            </ul>
          </div>
          <div className="col-lg-6 pt-4 pt-lg-0">
            <p>
              The delivery of the project is an important step as it is related with the project needs and takes
              part of the development time. We have own infrastructure on the Balkans where the project can be deployed,
              but also it can be delivered to third-party vendors as Azure, AWS and some hosting providers.
            </p>
            <a href="/" className="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section>
  );
}