import { useState } from 'react'
import './App.scss'

function OptimatorApp() {
  const [count, setCount] = useState(0)
  const { __, _x, _n, _nx } = wp.i18n;

  return (
    <>
      <div>
        <a href="https://vitejs.dev" target="_blank">
          <img src={optimator.plugin_url+'public/img/vite.svg'} className="logo" alt="Vite logo" />
        </a>
        <a href="https://react.dev" target="_blank">
          <img src={optimator.plugin_url+'public/img/react.svg'} className="logo react" alt="React logo" />
        </a>
      </div>
      <h1>{__('Optimator plugin structure with React + Vite')}</h1>
      <div className="card">
        <button onClick={() => setCount((count) => count + 1)}>
          {__('count is')} {count}
        </button>
        <p>
          Edit <code>src/App.jsx</code> and save to test HMR
        </p>
      </div>
      <p className="read-the-docs">
        {__('Click on the Vite and React logos to learn more')}
      </p>
    </>
  )
}

export default OptimatorApp
