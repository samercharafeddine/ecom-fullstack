import logo from "./logo.svg";
import "./App.css";
import ProductCard from "./Components/ProductCard";
import axios from "axios";
import { useEffect, useState } from "react";

function App() {
  const [products, setproducts] = useState([]);
  function get_products() {
    let data = new FormData();

    axios({
      url: "http://127.0.0.1:8000/api/products",
      method: "get",
    }).then(function (res) {
      setproducts(res.data.products);
    });
  }

  useEffect(() => {
    get_products();
  }, []);

  return (
    <div className="card-container">
      {products &&
        products.map((product) => {
          return (
            <ProductCard
              key={product.id}
              title={product.title}
              description={product.description}
            />
          );
        })}
    </div>
  );
}

export default App;
