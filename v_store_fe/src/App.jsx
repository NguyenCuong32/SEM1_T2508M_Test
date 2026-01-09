import Items from "./pages/ItemsPage";
import Header from "./components/Header/Header";
import Footer from "./components/footer/Footer";

export default function App() {
  return (
    <div style={{ display: 'flex', flexDirection: 'column', minHeight: '100vh' }}>
      
      <Header />
      
      
      <main style={{ flex: 1, padding: '20px' }}>
        <Items />
      </main>

      
      <div style={{ padding: '0 20px 20px 20px' }}>
         <Footer />
      </div>
    </div>
  );
}