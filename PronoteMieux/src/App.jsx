import { useState } from 'react'
import './App.css'

function App() {
  const [nom, setNom] = useState('');
  return (
    <>
      <input
        type = "text"
        value ={nom}
        onChange={(e) => setNom(e.target.value)}
      />

      <input
        type = "password"
        onChange={(e) => setNom(e.target.value)}
      />
    </>
  )
}

export default App
