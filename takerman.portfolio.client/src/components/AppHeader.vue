<script>
export default {
  mounted() {
  }
}
</script>

<template>
  <header id="header" className="fixed-top ">
    <div className="container d-flex align-items-center">
      <h1 className="logo me-auto"><a href="/">Takerman</a></h1>
      <!-- {
      <a href="index.html" className="logo me-auto"
        ><img src="/assets/img/logo.png" alt="" className="img-fluid"
      /></a>
      } -->
      <nav id="navbar" className="navbar">
        <ul>
          <li><a className="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a className="nav-link scrollto" href="#about">About</a></li>
          <li>
            <a className="nav-link scrollto" href="#services">Services</a>
          </li>
          <li><a className="nav-link scrollto" href="#contact">Contact</a></li>
          <li>
            <a className="getstarted scrollto" href="#about">Get Started</a>
          </li>
        </ul>
        <i className="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
</template>
