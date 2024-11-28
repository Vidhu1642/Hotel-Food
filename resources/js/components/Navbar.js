import React from "react";
import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <nav className="bg-blue-500 p-4 text-white flex justify-between">
      <div>
        <Link to="/" className="font-bold text-xl">
          Hotel-Food Management
        </Link>
      </div>
      <div className="flex space-x-4">
        <Link to="/hotels" className="hover:text-gray-300">Hotels</Link>
        <Link to="/foods" className="hover:text-gray-300">Foods</Link>
        <Link to="/dashboard" className="hover:text-gray-300">Dashboard</Link>
      </div>
    </nav>
  );
};

export default Navbar;
