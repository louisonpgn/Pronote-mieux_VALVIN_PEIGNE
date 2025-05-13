import { useState } from 'react'
import './App.css'

function App() {
  const [nom, setNom] = useState('');
  const [mdp, setMdp] = useState('');
  const [notes, setNotes] = useState([]);
  const [error, setError] = useState('');

  const handleConnexion = async () => {
    const response = await fetch("http://localhost/API.php?utilisateur="+nom+"&motdepasse="+mdp);

    const data = await response.json();

    if (data.success) {
      setNotes(data.notes);
      setError('');
    } else {
      setError(data.message);
      setNotes([]);
    }
  };

  function AfficherTableau() {
    return (
      test
    );
  };

  return (
    <>
      <div style={{ padding: '20px' }}>
      <h2>Connexion Étudiant</h2>
      <input
        type="text"
        placeholder="Nom"
        value={nom}
        onChange={(e) => setNom(e.target.value)}
      />
      <input
        type="password"
        placeholder="Mot de passe"
        value={mdp}
        onChange={(e) => setMdp(e.target.value)}
      />
      <button onClick={handleConnexion}>Se connecter</button>

      {error && <p style={{ color: 'red' }}>{error}</p>}
    </div>
    </>
  );
}

export default App
