import './App.css';
import AppHeader from './components/AppHeader';
import Hero from './components/Hero';
import AboutUs from './components/AboutUs';
import Skills from './components/Skills';
import Services from './components/Services';
import Contact from './components/Contact';
import Footer from './components/Footer';
import Preloader from './components/Preloader';

function App() {
  return (
    <>
      <AppHeader></AppHeader>
      <Hero></Hero>
      <main id="main">
        <AboutUs></AboutUs>
        <Skills></Skills>
        <Services></Services>
        <Contact></Contact>
      </main>
      <Footer></Footer>
      <Preloader></Preloader>
    </>
  );
}

export default App;
