<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f9fc;
            color: #444;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-weight: 500;
            margin-bottom: 40px;
        }

        .report-container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        th,
        td {
            padding: 15px 20px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
        }

        td {
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        tr:nth-child(even) td {
            background-color: #f1f5fa;
        }

        tr:hover td {
            background-color: #e1effd;
        }

        .no-data {
            color: #888;
            font-style: italic;
        }

        .header-cell {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Monthly Report - {{ now()->format('F Y') }}</h1>

    <div class="report-container">
        <table>
            <thead>
                <tr>
                    <th class="header-cell">Metric</th>
                    <th class="header-cell">Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Quizzes Created</td>
                    <td>{{ $monthlyQuizzes }}</td>
                </tr>
                <tr>
                    <td>Total User Registrations</td>
                    <td>{{ $monthlyUsers }}</td>
                </tr>
                <tr>
                    <td>Total Quiz Participations</td>
                    <td>{{ $monthlyQuizParticipations }}</td>
                </tr>
                <tr>
                    <td>Most Popular Quiz</td>
                    <td>
                        @if($mostPopularQuizTitle !== 'No data available')
                            {{ $mostPopularQuizTitle }} ({{ $mostPopularQuizParticipations }} participations)
                        @else
                            <span class="no-data">{{ $mostPopularQuizTitle }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Average Quiz Score</td>
                    <td>
                        @if($averageQuizScore !== null)
                            {{ number_format($averageQuizScore, 2) }}
                        @else
                            <span class="no-data">No data available</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Highest Score</td>
                    <td>
                        @if($highestScore !== 'No data available')
                            {{ $highestScore }}
                        @else
                            <span class="no-data">No data available</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Lowest Score</td>
                    <td>
                        @if($lowestScore !== 'No data available')
                            {{ $lowestScore }}
                        @else
                            <span class="no-data">No data available</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>