import { useState } from 'react'
import './App.css'

function App() {
  const [nom, setNom] = useState('');
  const [mdp, setMdp] = useState('');
  const [notes, setNotes] = useState([]);
  const [error, setError] = useState('');
  const [estConnecte, setEstConnecte] = useState(false);

  const handleConnexion = async () => {
    const response = await fetch(`http://localhost/API.php?utilisateur=${nom}&motdepasse=${mdp}`);
    const data = await response.json();

    if (Array.isArray(data)) {
      setNotes(data);
      setError('');
      setEstConnecte(true);
    } else {
      setError('Nom ou mot de passe incorrect.');
      setNotes([]);
      setEstConnecte(false);
    }
  };

  return (
    <div style={{ padding: '20px' }}>
      {!estConnecte ? (
        <>
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
        </>
      ) : (
        <>
          <h2>Bienvenue, {nom}</h2>
          <h3>Voici vos notes :</h3>
          <table border="1">
            <thead>
              <tr>
                <th>Matière</th>
                <th>Note</th>
              </tr>
            </thead>
            <tbody>
              {notes.map((note, index) => (
                <tr key={index}>
                  <td>{note.Matiere}</td>
                  <td>{note.Notes}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </>
      )}
    </div>
  );
}

export default App;