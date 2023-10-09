import React from 'react';
import { createRoot } from 'react-dom/client';
import { HashRouter } from 'react-router-dom';
import App from './App';

// Render your React component instead
document.addEventListener('DOMContentLoaded', () => {
  const element = document.getElementById('wp-react-rest-root');
  const root = createRoot(element);
  root.render(
    <React.StrictMode>
      <HashRouter>
        <App />
      </HashRouter>
    </React.StrictMode>
  );
});
