<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTrack - Expense Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <h1 class="text-2xl font-bold text-gray-800">smart wallet</h1>
                </div>
                <p class="text-gray-500 text-sm mt-1">Personal Finance Manager</p>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="index.php" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-tachometer-alt w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="incomes.php" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-money-bill-wave w-5"></i>
                            <span>Incomes</span>
                        </a>
                    </li>
                    <li>
                        <a href="expenses.php" class="sidebar-active flex items-center space-x-3 p-3 rounded-lg">
                            <i class="fas fa-shopping-cart w-5"></i>
                            <span>Expenses</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="reports.html" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
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
                        <h2 class="text-2xl font-bold text-gray-800">Expense Management</h2>
                        <p class="text-gray-600">Track and control your spending</p>
                    </div>
                    <button id="addExpenseBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Add New Expense</span>
                    </button>
                </div>

            
            </header>

            <!-- Main Content Area -->
            <div class="p-8">
                <!-- Stats and Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Left Column - Stats Cards -->
                    <div class="lg:col-span-2">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Total Expenses Card -->
                            <div class="bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-red-100">Total Expenses</p>
                                        <h3 id="totalExpenses" class="text-3xl font-bold mt-2">$0.00</h3>
                                        <p class="text-red-100 mt-2">All time</p>
                                    </div>
                                    <div class="w-12 h-12 bg-red-400 rounded-full flex items-center justify-center">
                                        <i class="fas fa-receipt text-2xl"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- This Month Expenses -->
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-gray-500">This Month</p>
                                        <h3 id="monthlyExpenses" class="text-3xl font-bold mt-2 text-gray-800">$0.00</h3>
                                        <p class="text-red-500 mt-2">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            <span id="monthlyChange">0%</span> from last month
                                        </p>
                                    </div>
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-calendar-alt text-blue-600 text-2xl"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Average Daily -->
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-gray-500">Average Daily</p>
                                        <h3 id="averageDaily" class="text-3xl font-bold mt-2 text-gray-800">$0.00</h3>
                                        <p class="text-gray-500 mt-2">This month</p>
                                    </div>
                                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Budget Progress -->
                        <div class="mt-6 bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold text-gray-800">Monthly Budget Progress</h3>
                                <span class="text-gray-600">$<span id="spentAmount">0</span> / $<span id="budgetAmount">2000</span></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div id="budgetProgress" class="bg-green-500 h-3 rounded-full progress-bar" style="width: 0%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600 mt-2">
                                <span>0%</span>
                                <span id="budgetPercentage">0%</span>
                                <span>100%</span>
                            </div>
                            <div class="mt-4 flex justify-between">
                                <span class="text-green-600">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    <span id="budgetRemaining">$2000</span> remaining
                                </span>
                                <button id="setBudgetBtn" class="text-blue-600 hover:text-blue-800 text-sm">
                                    <i class="fas fa-edit mr-1"></i> Set Budget
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Category Chart -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-6">Expenses by Category</h3>
                        <div class="h-64">
                            <canvas id="categoryChart"></canvas>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">
                                <i class="fas fa-chart-pie mr-1"></i> View Detailed Report
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Expenses Table -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Expense Records</h3>
                                <p class="text-gray-600 text-sm mt-1">All your spending transactions</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-700 text-sm">Show:</span>
                                    <select id="rowsPerPage" class="border border-gray-300 rounded-lg px-3 py-1 text-sm">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <button id="exportBtn" class="text-gray-600 hover:text-gray-800 border border-gray-300 rounded-lg px-3 py-1 text-sm">
                                    <i class="fas fa-file-export mr-1"></i> Export
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="description">
                                            Description <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="category">
                                            Category <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="amount">
                                            Amount <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="paymentMethod">
                                            Payment <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="date">
                                            Date <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="expensesTableBody">
                                <!-- Expenses will be loaded here dynamically -->
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500" id="noExpensesMessage">
                                        <i class="fas fa-shopping-cart text-4xl text-gray-300 mb-4"></i>
                                        <p class="text-lg">No expense records found</p>
                                        <p class="text-sm mt-1">Click "Add New Expense" to get started</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                  
                <!-- Recent High Expenses -->
                <div class="mt-8 bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Recent High Expenses (> $100)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="highExpensesList">
                        <!-- High expenses will be loaded here dynamically -->
                        <div class="text-center py-4 text-gray-500">
                            No high expenses found
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Expense Modal -->
    <div id="expenseModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-6 w-full max-w-md slide-in">
            <div class="flex justify-between items-center mb-6">
                <h3 id="modalTitle" class="text-xl font-bold text-gray-800">Add New Expense</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="expenseForm" class="space-y-4">
                <input type="hidden" id="expenseId">
                
                <div>
                    <label class="block text-gray-700 mb-2">Description *</label>
                    <input type="text" id="description" required 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Groceries, Restaurant, Gas, etc.">
                    <div id="descriptionError" class="text-red-500 text-sm mt-1 hidden">Description is required</div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Category *</label>
                        <select id="category" required 
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Category</option>
                            <option value="food">Food & Dining</option>
                            <option value="transport">Transportation</option>
                            <option value="shopping">Shopping</option>
                            <option value="housing">Housing</option>
                            <option value="utilities">Utilities</option>
                            <option value="entertainment">Entertainment</option>
                            <option value="health">Health</option>
                            <option value="education">Education</option>
                            <option value="other">Other</option>
                        </select>
                        <div id="categoryError" class="text-red-500 text-sm mt-1 hidden">Category is required</div>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Payment Method *</label>
                        <select id="paymentMethod" required 
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Method</option>
                            <option value="cash">Cash</option>
                            <option value="card">Credit Card</option>
                            <option value="debit">Debit Card</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="digital">Digital Wallet</option>
                            <option value="other">Other</option>
                        </select>
                        <div id="paymentMethodError" class="text-red-500 text-sm mt-1 hidden">Payment method is required</div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Amount *</label>
                        <div class="relative">
                            <span class="absolute left-3 top-3 text-gray-500">$</span>
                            <input type="number" id="amount" step="0.01" min="0" required 
                                   class="w-full p-3 pl-8 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="0.00">
                        </div>
                        <div id="amountError" class="text-red-500 text-sm mt-1 hidden">Amount must be greater than 0</div>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Date *</label>
                        <input type="date" id="date" required 
                               class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <div id="dateError" class="text-red-500 text-sm mt-1 hidden">Date is required</div>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Merchant/Store (Optional)</label>
                    <input type="text" id="merchant" 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Store name, website, etc.">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Notes (Optional)</label>
                    <textarea id="notes" rows="3" 
                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Additional details about this expense"></textarea>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="isRecurring" class="mr-2">
                    <label for="isRecurring" class="text-gray-700">This is a recurring expense</label>
                </div>

                <div id="recurringOptions" class="hidden space-y-2">
                    <label class="block text-gray-700 mb-2">Recurrence Pattern</label>
                    <select id="recurrencePattern" class="w-full p-3 border border-gray-300 rounded-lg">
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <button type="button" id="cancelBtn" class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" id="submitBtn" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save Expense
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Set Budget Modal -->
    <div id="budgetModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-6 w-full max-w-md slide-in">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Set Monthly Budget</h3>
                <button id="closeBudgetModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="budgetForm" class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Monthly Budget Amount *</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-500">$</span>
                        <input type="number" id="budgetInput" step="0.01" min="0" required 
                               class="w-full p-3 pl-8 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="2000.00">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Month</label>
                    <input type="month" id="budgetMonth" required 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Notes (Optional)</label>
                    <textarea id="budgetNotes" rows="3" 
                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Budget goals, restrictions, etc."></textarea>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <button type="button" id="cancelBudgetBtn" class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save Budget
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Sample data - In real app, this would come from PHP/MySQL
        let expenses = [
            {
                id: 1,
                description: "Grocery Shopping",
                category: "food",
                amount: 124.50,
                paymentMethod: "card",
                date: "2023-10-15",
                merchant: "SuperMart",
                notes: "Weekly groceries",
                isRecurring: false
            },
            {
                id: 2,
                description: "Gasoline",
                category: "transport",
                amount: 65.00,
                paymentMethod: "card",
                date: "2023-10-14",
                merchant: "Shell Station",
                notes: "Full tank",
                isRecurring: false
            },
            {
                id: 3,
                description: "Internet Bill",
                category: "utilities",
                amount: 89.99,
                paymentMethod: "bank",
                date: "2023-10-10",
                merchant: "Internet Provider",
                notes: "Monthly subscription",
                isRecurring: true
            },
            {
                id: 4,
                description: "Restaurant Dinner",
                category: "food",
                amount: 75.25,
                paymentMethod: "card",
                date: "2023-10-12",
                merchant: "Italian Bistro",
                notes: "Family dinner",
                isRecurring: false
            },
            {
                id: 5,
                description: "Movie Tickets",
                category: "entertainment",
                amount: 40.00,
                paymentMethod: "cash",
                date: "2023-10-08",
                merchant: "Cinema City",
                notes: "Weekend movie",
                isRecurring: false
            },
            {
                id: 6,
                description: "New Shoes",
                category: "shopping",
                amount: 120.00,
                paymentMethod: "card",
                date: "2023-10-05",
                merchant: "Sport Store",
                notes: "Running shoes",
                isRecurring: false
            },
            {
                id: 7,
                description: "Electricity Bill",
                category: "utilities",
                amount: 135.75,
                paymentMethod: "bank",
                date: "2023-10-01",
                merchant: "Power Company",
                notes: "Monthly bill",
                isRecurring: true
            },
            {
                id: 8,
                description: "Gym Membership",
                category: "health",
                amount: 45.00,
                paymentMethod: "card",
                date: "2023-10-01",
                merchant: "Fitness Center",
                notes: "Monthly fee",
                isRecurring: true
            }
        ];

        // Budget data
        let monthlyBudget = 2000;

        // State management
        let currentSort = { field: 'date', direction: 'desc' };
        let currentFilter = { category: '', month: '', paymentMethod: '' };
        let currentSearch = '';
        let currentPage = 1;
        let itemsPerPage = 10;

        // DOM Elements
        const elements = {
            tableBody: document.getElementById('expensesTableBody'),
            noExpensesMessage: document.getElementById('noExpensesMessage'),
            totalExpenses: document.getElementById('totalExpenses'),
            monthlyExpenses: document.getElementById('monthlyExpenses'),
            monthlyChange: document.getElementById('monthlyChange'),
            averageDaily: document.getElementById('averageDaily'),
            budgetProgress: document.getElementById('budgetProgress'),
            budgetPercentage: document.getElementById('budgetPercentage'),
            spentAmount: document.getElementById('spentAmount'),
            budgetAmount: document.getElementById('budgetAmount'),
            budgetRemaining: document.getElementById('budgetRemaining'),
            highExpensesList: document.getElementById('highExpensesList'),
            addExpenseBtn: document.getElementById('addExpenseBtn'),
            expenseModal: document.getElementById('expenseModal'),
            closeModal: document.getElementById('closeModal'),
            cancelBtn: document.getElementById('cancelBtn'),
            expenseForm: document.getElementById('expenseForm'),
            modalTitle: document.getElementById('modalTitle'),
            expenseId: document.getElementById('expenseId'),
            description: document.getElementById('description'),
            category: document.getElementById('category'),
            amount: document.getElementById('amount'),
            date: document.getElementById('date'),
            merchant: document.getElementById('merchant'),
            notes: document.getElementById('notes'),
            paymentMethod: document.getElementById('paymentMethod'),
            isRecurring: document.getElementById('isRecurring'),
            recurringOptions: document.getElementById('recurringOptions'),
            recurrencePattern: document.getElementById('recurrencePattern'),
            searchInput: document.getElementById('searchInput'),
            categoryFilter: document.getElementById('categoryFilter'),
            monthFilter: document.getElementById('monthFilter'),
            paymentMethodFilter: document.getElementById('paymentMethodFilter'),
            applyFilter: document.getElementById('applyFilter'),
            resetFilter: document.getElementById('resetFilter'),
            rowsPerPage: document.getElementById('rowsPerPage'),
            exportBtn: document.getElementById('exportBtn'),
            setBudgetBtn: document.getElementById('setBudgetBtn'),
            budgetModal: document.getElementById('budgetModal'),
            closeBudgetModal: document.getElementById('closeBudgetModal'),
            cancelBudgetBtn: document.getElementById('cancelBudgetBtn'),
            budgetForm: document.getElementById('budgetForm'),
            budgetInput: document.getElementById('budgetInput'),
            budgetMonth: document.getElementById('budgetMonth'),
            budgetNotes: document.getElementById('budgetNotes'),
            sortButtons: document.querySelectorAll('.sortable'),
            prevPage: document.getElementById('prevPage'),
            nextPage: document.getElementById('nextPage'),
            currentPage: document.getElementById('currentPage'),
            totalPages: document.getElementById('totalPages'),
            startRow: document.getElementById('startRow'),
            endRow: document.getElementById('endRow'),
            totalRows: document.getElementById('totalRows')
        };

        // Chart instance
        let categoryChart;

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderTable();
            updateStats();
            updateBudgetProgress();
            updateHighExpenses();
            initializeChart();
            setupEventListeners();
            setCurrentDate();
        });

        function setupEventListeners() {
            // Modal controls
            elements.addExpenseBtn.addEventListener('click', () => openModal());
            elements.closeModal.addEventListener('click', () => closeModal());
            elements.cancelBtn.addEventListener('click', () => closeModal());

            // Form submission
            elements.expenseForm.addEventListener('submit', handleSubmit);

            // Recurring expense toggle
            elements.isRecurring.addEventListener('change', function() {
                elements.recurringOptions.classList.toggle('hidden', !this.checked);
            });

            // Search and filter
            elements.searchInput.addEventListener('input', (e) => {
                currentSearch = e.target.value.toLowerCase();
                currentPage = 1;
                renderTable();
            });

            elements.applyFilter.addEventListener('click', applyFilters);
            elements.resetFilter.addEventListener('click', resetFilters);

            // Rows per page
            elements.rowsPerPage.addEventListener('change', (e) => {
                itemsPerPage = parseInt(e.target.value);
                currentPage = 1;
                renderTable();
            });

            // Export button
            elements.exportBtn.addEventListener('click', exportData);

            // Budget modal
            elements.setBudgetBtn.addEventListener('click', () => openBudgetModal());
            elements.closeBudgetModal.addEventListener('click', () => closeBudgetModal());
            elements.cancelBudgetBtn.addEventListener('click', () => closeBudgetModal());
            elements.budgetForm.addEventListener('submit', handleBudgetSubmit);

            // Sorting
            elements.sortButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const field = button.dataset.sort;
                    toggleSort(field);
                });
            });

            // Pagination
            elements.prevPage.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable();
                }
            });

            elements.nextPage.addEventListener('click', () => {
                const totalPages = Math.ceil(getFilteredExpenses().length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTable();
                }
            });

            elements.currentPage.addEventListener('change', (e) => {
                const totalPages = Math.ceil(getFilteredExpenses().length / itemsPerPage);
                const page = Math.max(1, Math.min(totalPages, parseInt(e.target.value) || 1));
                currentPage = page;
                renderTable();
            });

            // Close modals on outside click
            elements.expenseModal.addEventListener('click', (e) => {
                if (e.target === elements.expenseModal) {
                    closeModal();
                }
            });

            elements.budgetModal.addEventListener('click', (e) => {
                if (e.target === elements.budgetModal) {
                    closeBudgetModal();
                }
            });
        }

        function getFilteredExpenses() {
            return expenses.filter(expense => {
                // Apply search filter
                if (currentSearch && 
                    !expense.description.toLowerCase().includes(currentSearch) &&
                    !(expense.merchant && expense.merchant.toLowerCase().includes(currentSearch)) &&
                    !(expense.notes && expense.notes.toLowerCase().includes(currentSearch))) {
                    return false;
                }

                // Apply category filter
                if (currentFilter.category && expense.category !== currentFilter.category) {
                    return false;
                }

                // Apply month filter
                if (currentFilter.month) {
                    const expenseDate = new Date(expense.date);
                    const expenseMonth = `${expenseDate.getFullYear()}-${String(expenseDate.getMonth() + 1).padStart(2, '0')}`;
                    if (expenseMonth !== currentFilter.month) {
                        return false;
                    }
                }

                // Apply payment method filter
                if (currentFilter.paymentMethod && expense.paymentMethod !== currentFilter.paymentMethod) {
                    return false;
                }

                return true;
            });
        }

        function getSortedExpenses(filteredExpenses) {
            return filteredExpenses.sort((a, b) => {
                let aVal = a[currentSort.field];
                let bVal = b[currentSort.field];

                // Handle date sorting
                if (currentSort.field === 'date') {
                    aVal = new Date(a.date);
                    bVal = new Date(b.date);
                }

                // Handle numeric sorting
                if (currentSort.field === 'amount') {
                    aVal = parseFloat(a.amount);
                    bVal = parseFloat(b.amount);
                }

                if (currentSort.direction === 'asc') {
                    return aVal > bVal ? 1 :