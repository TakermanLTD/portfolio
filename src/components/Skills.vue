<template>
  <section id="skills" className="skills">
    <div className="container" data-aos="fade-up">
      <div className="row">
        <div
          className="col-lg-6 d-flex align-items-center"
          data-aos="fade-right"
          data-aos-delay="100"
        >
          <img src="@/assets/img/skills.png" className="img-fluid" alt="" />
        </div>
        <div
          className="col-lg-6 pt-4 pt-lg-0 content"
          data-aos="fade-left"
          data-aos-delay="100"
        >
          <h3>On-Demand skills</h3>
          <p className="fst-italic">
            We work with the latest technologies and we look into the future. We
            also have used legacy tehcnologies too so you can aim for any of
            them. Most preferable framework of us is the .NET one.
          </p>

          <div className="skills-content">
            <div className="progress">
              <span className="skill"
                >.NET Core / ASP.NET <i className="val">90%</i></span
              >
              <div className="progress-bar-wrap">
                <div
                  className="progress-bar"
                  role="progressbar"
                  aria-valuenow="90"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>

            <div className="progress">
              <span className="skill"
                >SPA / React, Angular, Vue <i className="val">75%</i></span
              >
              <div className="progress-bar-wrap">
                <div
                  className="progress-bar"
                  role="progressbar"
                  aria-valuenow="75"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>

            <div className="progress">
              <span className="skill"
                >Databases / MS SQL, MySql, NoSql DBs
                <i className="val">75%</i></span
              >
              <div className="progress-bar-wrap">
                <div
                  className="progress-bar"
                  role="progressbar"
                  aria-valuenow="80"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>

            <div className="progress">
              <span className="skill"
                >Web Design <i className="val">70%</i></span
              >
              <div className="progress-bar-wrap">
                <div
                  className="progress-bar"
                  role="progressbar"
                  aria-valuenow="70"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
