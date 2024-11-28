import React, { useState, useEffect } from 'react';
import { Bar } from 'react-chartjs-2';
import axios from 'axios';
import { Chart as ChartJS, CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend } from 'chart.js';

// Registering Chart.js components
ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);

const Dashboard = () => {
  const [chartData, setChartData] = useState({});
  const [loading, setLoading] = useState(true);  // For loading state
  const [error, setError] = useState(null); // For error state

  useEffect(() => {
    const fetchMonthlyData = async () => {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/monthly-data');
        
        if (response.data) {
          const hotelCounts = response.data.hotels || [];
          const foodCounts = response.data.food || [];

          // Prepare data for the chart
          const data = {
            labels: hotelCounts.map(item => `Month ${item.month}`), // Labels for the months
            datasets: [
              {
                label: 'Hotels',
                data: hotelCounts.map(item => item.count),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
              },
              {
                label: 'Food',
                data: foodCounts.map(item => item.count),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
              },
            ],
          };

          setChartData(data); // Set the chart data
        }
      } catch (error) {
        setError('Error fetching monthly data');
        console.error("Error fetching monthly data:", error);
      } finally {
        setLoading(false);  // Stop loading
      }
    };

    fetchMonthlyData();
  }, []);

  if (loading) {
    return <div>Loading...</div>;
  }

  if (error) {
    return <div>{error}</div>;
  }

  return (
    <div>
      <h1>Dashboard</h1>
      <Bar data={chartData} />
    </div>
  );
};

export default Dashboard;
