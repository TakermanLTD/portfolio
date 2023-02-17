import React, { Component } from 'react';
import { Route, Routes } from 'react-router-dom';
import AppRoutes from './AppRoutes';
import { Layout } from './components/Layout';
import './custom.css';
import './App.css';
import AppHeader from './components/AppHeader';
import Hero from './components/Hero';
import AboutUs from './components/AboutUs';
import Skills from './components/Skills';
import Services from './components/Services';
import Contact from './components/Contact';
import Footer from './components/Footer';
import Preloader from './components/Preloader';

export default class App extends Component {
  static displayName = App.name;

  render() {
    return (
      <Layout>
      <>
      <AppHeader></AppHeader>
      <Hero></Hero>
      <main id="main">
        <AboutUs></AboutUs>
        <Skills></Skills>
        <Services></Services>
        <Contact></Contact>
        <Routes>
          {AppRoutes.map((route, index) => {
            const { element, ...rest } = route;
            return <Route key={index} {...rest} element={element} />;
          })}
        </Routes>
        </main>
      <Footer></Footer>
      <Preloader></Preloader>
    </>
      </Layout>
    );
  }
}
