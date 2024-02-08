import { useState } from 'react'
import Welcome from './components/Welcome';
import QuickToggle from './components/QuickToggle';
import Optimize from './components/Optimize';

function OptimatorApp() {
  const [tab, setTab] = useState('welcome')
  const { __, _x, _n, _nx } = wp.i18n;

  return (
    <>
      <div className="menu-bar">
        <div className="logo-wrap">
          <img src={optimator.plugin_url + 'public/logo/main-logo.svg'} alt="Optimator Main Logo" />
          {/* <p>v{optimator.plugin_version}</p> */}
          <p>v1.0.0</p>
        </div>
        <div className="menu-wrap">
          <div className="tabs">
            <a className={tab == 'welcome' ? 'menu-item active' : 'menu-item'} onClick={() => setTab('welcome')}>Welcome</a>
            <a className={tab == 'quick-toggle' ? 'menu-item active' : 'menu-item'} onClick={() => setTab('quick-toggle')}>Quick Toggle</a>
            <a className={tab == 'optimize' ? 'menu-item active' : 'menu-item'} onClick={() => setTab('optimize')}>Optimize</a>
          </div>
          <div className="actions">
            <a className="updrage">Updrage</a>
            <a className="help">Help</a>
          </div>
        </div>
      </div>
      <div className="content">
        {
          tab == 'welcome' ?
            <Welcome /> :
            tab == 'quick-toggle' ?
              <QuickToggle /> :
              <Optimize />
        }
      </div>
      {/* <div className="footer">
        Footer
      </div> */}
    </>
  )
}

export default OptimatorApp
