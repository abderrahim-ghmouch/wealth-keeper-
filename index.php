<?php 
    include_once " __DO__ ./database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTrack - Personal Finance Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
 <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-50">
    <!-- Main Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">FinTrack</h1>
                </div>
                <p class="text-gray-500 text-sm mt-1">Personal Finance Manager</p>
            </div>

            <!-- Navigation -->
                 <nav class="flex-1 p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="sidebar-active flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-tachometer-alt w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="incomes.php"
                            class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-money-bill-wave w-5"></i>
                            <span>Incomes</span>
                        </a>
                    </li>
                    <li>
                        <a href="expences.php" 
                        class="s flex items-center space-x-3 p-3 rounded-lg">
                            <i class="fas fa-shopping-cart w-5"></i>
                            <span>Expenses</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-file-export w-5"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 px-8 py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dashboard Overview</h2>
                        <p class="text-gray-600">Welcome back! Here's your financial summary</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="fas fa-bell text-gray-600 text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                        </div>
                        <button
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center space-x-2">
                            <i class="fas fa-plus"></i>
                            <span>Add Transaction</span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Dashboard -->
            <main class="p-8">
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Balance Card -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-2xl p-6 card-hover">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-blue-100">Current Balance</p>
                                <h3 class="text-3xl font-bold mt-2">$4,850.75</h3>
                                <p class="text-blue-100 mt-2"><i class="fas fa-arrow-up mr-1"></i> 12.5% from last month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-wallet text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Income Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm card-hover">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500">Total Income</p>
                                <h3 class="text-3xl font-bold mt-2 text-gray-800">$3,250.00</h3>
                                <p class="text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 8.2% from last month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-money-bill-wave text-green-600 text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Expenses Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm card-hover">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500">Total Expenses</p>
                                <h3 class="text-3xl font-bold mt-2 text-gray-800">$1,399.25</h3>
                                <p class="text-red-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 5.1% from last month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-red-600 text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Budget Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm card-hover">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500">Monthly Budget</p>
                                <h3 class="text-3xl font-bold mt-2 text-gray-800">$1,850.75</h3>
                                <p class="text-blue-500 mt-2">72% of budget used</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-chart-bar text-blue-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 72%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Tables Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Chart Section -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Income vs Expenses (Last 6 Months)</h3>
                            <div class="flex space-x-2">
                                <button class="px-4 py-2 bg-gray-100 rounded-lg text-sm">6 Months</button>
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">1 Year</button>
                            </div>
                        </div>
                        <div class="h-80">
                            <canvas id="financeChart"></canvas>
                        </div>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Recent Transactions</h3>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 text-gray-500 font-medium">Description</th>
                                        <th class="text-left py-3 text-gray-500 font-medium">Category</th>
                                        <th class="text-left py-3 text-gray-500 font-medium">Date</th>
                                        <th class="text-left py-3 text-gray-500 font-medium">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                                    <i class="fas fa-money-bill-wave text-green-600"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Freelance Payment</p>
                                                    <p class="text-gray-500 text-sm">Client Project</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <span
                                                class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Income</span>
                                        </td>
                                        <td class="py-4 text-gray-600">Oct 15, 2023</td>
                                        <td class="py-4 font-medium text-green-600">+ $850.00</td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                                    <i class="fas fa-shopping-cart text-red-600"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Grocery Shopping</p>
                                                    <p class="text-gray-500 text-sm">Supermarket</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <span
                                                class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Food</span>
                                        </td>
                                        <td class="py-4 text-gray-600">Oct 14, 2023</td>
                                        <td class="py-4 font-medium text-red-600">- $124.50</td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                    <i class="fas fa-subway text-blue-600"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Monthly Transport</p>
                                                    <p class="text-gray-500 text-sm">Public Transport</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <span
                                                class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Transport</span>
                                        </td>
                                        <td class="py-4 text-gray-600">Oct 13, 2023</td>
                                        <td class="py-4 font-medium text-red-600">- $75.00</td>
                                    </tr>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                                    <i class="fas fa-briefcase text-green-600"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Salary</p>
                                                    <p class="text-gray-500 text-sm">Monthly Salary</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <span
                                                class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Income</span>
                                        </td>
                                        <td class="py-4 text-gray-600">Oct 10, 2023</td>
                                        <td class="py-4 font-medium text-green-600">+ $2,400.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Expense by Category -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Expenses by Category</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-700">Food & Dining</span>
                                    <span class="font-medium">$420.50</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-red-500 h-2 rounded-full" style="width: 30%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-700">Transportation</span>
                                    <span class="font-medium">$245.00</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: 18%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-700">Entertainment</span>
                                    <span class="font-medium">$180.75</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-500 h-2 rounded-full" style="width: 13%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-700">Shopping</span>
                                    <span class="font-medium">$320.00</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 23%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-gray-700">Bills & Utilities</span>
                                    <span class="font-medium">$233.00</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 16%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Quick Actions</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <button
                                class="p-4 border border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 flex flex-col items-center justify-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-plus text-blue-600 text-xl"></i>
                                </div>
                                <p class="font-medium">Add Income</p>
                            </button>
                            <button
                                class="p-4 border border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 flex flex-col items-center justify-center">
                                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-minus text-red-600 text-xl"></i>
                                </div>
                                <p class="font-medium">Add Expense</p>
                            </button>
                            <button
                                class="p-4 border border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 flex flex-col items-center justify-center">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-chart-pie text-green-600 text-xl"></i>
                                </div>
                                <p class="font-medium">View Reports</p>
                            </button>
                            <button
                                class="p-4 border border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 flex flex-col items-center justify-center">
                                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-file-export text-purple-600 text-xl"></i>
                                </div>
                                <p class="font-medium">Export Data</p>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal for Add Transaction (Hidden by default) -->
    <div id="transactionModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 w-full max-w-md">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Add New Transaction</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <form action="./addIncome.php" method="post" id="transactionForm">
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Description</label>
                        <input required name="description" type="text" class="w-full p-3 border border-gray-300 rounded-lg"
                            placeholder="Enter description">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Amount</label>
                        <input type="number" name="amount" required step="0.01" class="w-full p-3 border border-gray-300 rounded-lg"
                            placeholder="0.00">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Category</label>
                        <select name="destination" class="w-full p-3 border border-gray-300 rounded-lg" required>
                            <option value="">Select Category</option>
                            <option value="salary">Salary</option>
                            <option value="freelance">Freelance</option>
                            <option value="food">Food & Dining</option>
                            <option value="transport">Transportation</option>
                            <option value="shopping">Shopping</option>
                            <option value="bills">Bills & Utilities</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Date</label>
                        <input name="date_income" type="date" class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>
                </div>
                <div class="mt-8 flex justify-end space-x-4">
                    <button type="button" id="cancelModal"
                        class="px-6 py-3 border border-gray-300 rounded-lg">Cancel</button>
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add
                        Transaction</button>
                </div>
            </form>
        </div>
    </div>

<!--<script>
    // Initialize Chart
    const ctx = document.getElementById('financeChart').getContext('2d');
    const financeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            datasets: [{
                    label: 'Income',
                    data: [2200, 2400, 2800, 3000, 2900, 3250],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Expenses',
                    data: [1200, 1400, 1100, 1500, 1300, 1399],
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return '$' + value;
                        }
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                }
            }
        }
    });

    // Modal functionality
    document.addEventListener('DOMContentLoaded', function() {
        const addTransactionBtn = document.querySelector('button.bg-blue-600');
        const transactionModal = document.getElementById('transactionModal');
        const closeModalBtn = document.getElementById('closeModal');
        const cancelModalBtn = document.getElementById('cancelModal');

        if (addTransactionBtn) {
            addTransactionBtn.addEventListener('click', function() {
                transactionModal.classList.remove('hidden');
            });
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', function() {
                transactionModal.classList.add('hidden');
            });
        }

        if (cancelModalBtn) {
            cancelModalBtn.addEventListener('click', function() {
                transactionModal.classList.add('hidden');
            });
        }

        // Close modal when clicking outside
        transactionModal.addEventListener('click', function(e) {
            if (e.target === transactionModal) {
                transactionModal.classList.add('hidden');
            }
        });

        // Form submission
        const transactionForm = document.getElementById('transactionForm');

        // Make table rows clickable (for edit functionality)
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('click', function() {
                // This would open an edit modal in a real app
                console.log('Edit transaction:', this.cells[0].textContent);
            });
        });
    });
    </script>-->


    
</body>

</html>