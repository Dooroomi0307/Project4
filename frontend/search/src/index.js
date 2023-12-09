import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import Search from './search.js';

import {BrowserRouter, Routes} from'react-router-dom';


const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <Search />  
  </React.StrictMode>
);


