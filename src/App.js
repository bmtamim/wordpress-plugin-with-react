import React, { useEffect } from 'react';
import { Route, Routes, useLocation } from 'react-router-dom';
import Home from './components/Home.js';
import Okay from './components/Okay.js';
import Page from './components/Page.js';
import Posts from './components/Posts.js';
export default function App() {
  const router = useLocation();
  //Active Menu Link
  useEffect(() => {
    const pathName = '#' + router?.pathname;
    const menuItems = document.querySelectorAll('#toplevel_page_wp-react-rest ul > li');

    menuItems.forEach((item, index) => {
      const menuLink = item.querySelector('a');
      if (!menuLink) {
        return;
      }
      const getHref = menuLink.getAttribute('href');
      const menuLinkPath = getHref.substring(getHref.indexOf('#'));

      if (menuLinkPath === pathName) {
        item.classList.add('current');
      } else if (menuLinkPath === '#' && pathName === '#/') {
        item.classList.add('current');
      } else {
        item.classList.remove('current');
      }
    });
  }, [router]);

  return (
    <>
      <Routes>
        <Route path="/" element={<Home />}></Route>
        <Route path="/posts" element={<Posts />}></Route>
        <Route path="/pages" element={<Page />} />
        <Route path="*" element={<Okay />} />
      </Routes>
    </>
  );
}
