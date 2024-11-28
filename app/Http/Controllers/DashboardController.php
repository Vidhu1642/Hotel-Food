<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Food;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // 1. Count total hotels and foods
        $hotelCount = Hotel::count();
        $foodCount = Food::count();

        // 2. Get the monthly count of foods (group by month)
        $monthlyData = Food::selectRaw('MONTH(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare chart data
        $labels = [];
        $data = [];
        foreach ($monthlyData as $dataPoint) {
            $labels[] = $this->getMonthName($dataPoint->month);
            $data[] = $dataPoint->count;
        }

        // Prepare chart object
        $chart = new Chart;
        $chart->labels($labels);
        $chart->dataset('Monthly Foods Count', 'line', $data)
              ->backgroundColor('rgba(75, 192, 192, 0.2)')   // Light teal background
                   
             
              ->fill(true);  // Allow filling under the line

        // Return data to the view or API
        return response()->json([
            'hotel_count' => $hotelCount,
            'food_count' => $foodCount,
            'chart' => [
                'labels' => $labels,
                'data' => $data
            ]
        ]);
    }

    private function getMonthName($monthNumber)
    {
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June',
            7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        return $months[$monthNumber];
    }
}
