const I18N = {
  es: { title: "Wuki", subtitle: "Seed: React + PHP + MySQL", toggle: "EN", test: "Probar API", lang: "es" },
  en: { title: "Wuki", subtitle: "Seed: React + PHP + MySQL", toggle: "ES", test: "Test API", lang: "en" },
};
function App() {
  const [lang, setLang] = React.useState(() => localStorage.getItem("lang") || (navigator.language||"").startsWith("es") ? "es" : "en");
  React.useEffect(()=>localStorage.setItem("lang",lang),[lang]);
  const t = I18N[lang]; const [resp,setResp]=React.useState(null);
  const testApi=async()=>{try{const r=await fetch("/api/health.php"); setResp(await r.json());}catch(e){setResp({ok:false,error:String(e)})}};
  return (
    <div className="space-y-4">
      <header className="flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-semibold">{t.title}</h1>
          <p className="text-slate-600">{t.subtitle}</p>
        </div>
        <button onClick={()=>setLang(lang==="es"?"en":"es")} className="px-3 py-1.5 rounded-lg bg-indigo-600 text-white">{t.toggle}</button>
      </header>
      <main className="bg-white rounded-2xl border border-slate-100 p-5 shadow-sm">
        <button onClick={testApi} className="px-4 py-2 rounded-lg bg-slate-900 text-white">{t.test}</button>
        {resp && <pre className="mt-4 text-sm bg-slate-50 border border-slate-200 rounded-xl p-3 overflow-auto">{JSON.stringify(resp,null,2)}</pre>}
      </main>
    </div>
  );
}
ReactDOM.createRoot(document.getElementById("root")).render(<App />);
