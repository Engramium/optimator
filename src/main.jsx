import React from 'react'
import ReactDOM from 'react-dom/client'
import OptimatorApp from './App.jsx'
import './main.scss'

ReactDOM.createRoot(document.getElementById('optimator-dashboard-app')).render(
  <React.StrictMode>
    <OptimatorApp />
  </React.StrictMode>,
)
