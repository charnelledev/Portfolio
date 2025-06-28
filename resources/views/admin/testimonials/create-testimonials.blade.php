



<!--=================== ADD PROJECT ====================-->
<section class="bg-white dark:bg-gray-900 py-10 px-6 rounded-lg shadow-md" id="project">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6 border-b pb-3">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Créer un projet</h1>
        <button
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-semibold shadow-md transition">
            💾 Enregistrer
        </button>
    </div>

    <!-- Form Wrapper -->
    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Left Column -->
        <div class="flex-1">
            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-inner space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Titre</label>
                    <input type="text" placeholder="Titre du projet"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Description</label>
                    <textarea rows="5" placeholder="Description"
                        class="w-full mt-1 px-4 py-2 border rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Lien</label>
                    <input type="text" placeholder="https://lien-du-projet.com"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="w-full lg:w-1/3">
            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-inner flex flex-col items-center gap-4">
                <img src="../../template/assets/img/no-image.png" alt="Image projet"
                    class="w-40 h-40 object-cover rounded border dark:border-gray-600">
                <input type="file"
                    class="w-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
            </div>
        </div>
    </div>

    <!-- Footer Save -->
    <div class="flex justify-end mt-6">
        <button
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition">
            💾 Enregistrer
        </button>
    </div>
</section>



