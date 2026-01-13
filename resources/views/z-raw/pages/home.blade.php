<include-fragment src="./views/components/alert-error.html"></include-fragment>

<!-- Component Start -->
<div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl">
  <!-- Tile 1 -->
  <div class="flex items-center p-4 bg-white rounded">
    <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
      <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
          clip-rule="evenodd" />
      </svg>
    </div>
    <div class="flex-grow flex flex-col ml-4">
      <span class="text-xl font-bold">$8,430</span>
      <div class="flex items-center justify-between">
        <span class="text-gray-500">Revenue last 30 days</span>
        <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span>
      </div>
    </div>
  </div>

  <!-- Tile 2 -->
  <div class="flex items-center p-4 bg-white rounded">
    <div class="flex flex-shrink-0 items-center justify-center bg-red-200 h-16 w-16 rounded">
      <svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
          clip-rule="evenodd" />
      </svg>
    </div>
    <div class="flex-grow flex flex-col ml-4">
      <span class="text-xl font-bold">211</span>
      <div class="flex items-center justify-between">
        <span class="text-gray-500">Sales last 30 days</span>
        <span class="text-red-500 text-sm font-semibold ml-2">-8.1%</span>
      </div>
    </div>
  </div>

  <!-- Tile 3 -->
  <div class="flex items-center p-4 bg-white rounded">
    <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
      <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
          clip-rule="evenodd" />
      </svg>
    </div>
    <div class="flex-grow flex flex-col ml-4">
      <span class="text-xl font-bold">140</span>
      <div class="flex items-center justify-between">
        <span class="text-gray-500">Customers last 30 days</span>
        <span class="text-green-500 text-sm font-semibold ml-2">+28.4%</span>
      </div>
    </div>
  </div>
</div>
<!-- Component End  -->

<div
  class="relative flex flex-col items-start p-4 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100"
  draggable="true">
  <button
    class="hidden absolute top-0 right-0 lg:flex lg:items-center lg:justify-center w-5 h-5 mt-3 mr-2 text-gray-500 hover:bg-gray-200 hover:text-gray-700 group-hover:flex rounded">
    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
      fill="currentColor">
      <path
        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
      </path>
    </svg>
  </button>
  <span
    class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">Design</span>
  <h4 class="mt-3 text-sm font-medium">This is the title of the card for the thing that needs to be
    done.</h4>
  <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
    <div class="flex items-center">
      <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
          clip-rule="evenodd"></path>
      </svg>
      <span class="ml-1 leading-none">Dec 12</span>
    </div>
    <div class="relative flex items-center ml-4">
      <svg class="relative w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
          clip-rule="evenodd"></path>
      </svg>
      <span class="ml-1 leading-none">4</span>
    </div>
    <div class="flex items-center ml-4">
      <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
          clip-rule="evenodd"></path>
      </svg>
      <span class="ml-1 leading-none">1</span>
    </div>
    <img class="w-6 h-6 ml-auto rounded-full"
      src="https://randomuser.me/api/portraits/women/26.jpg">
  </div>
</div>

<div class="shadow-lg px-4 py-6 w-full bg-white dark:bg-gray-800 relative">
  <p class="text-sm w-max text-gray-700 dark:text-white font-semibold border-b border-gray-200">
      Project Reffered
  </p>
  <div class="flex items-end space-x-2 my-6">
      <p class="text-5xl text-black dark:text-white font-bold">
          12
      </p>
      <span class="text-green-500 text-xl font-bold flex items-center">
          <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
              <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
              </path>
          </svg>
          22%
      </span>
  </div>
  <div class="dark:text-white">
      <div class="flex items-center pb-2 mb-2 text-sm space-x-12 md:space-x-24 justify-between border-b border-gray-200">
          <p>
              Unique refferal URL
          </p>
          <div class="flex items-end text-xs">
              34
              <span class="flex items-center">
                  <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                      </path>
                  </svg>
                  22%
              </span>
          </div>
      </div>
      <div class="flex items-center mb-2 pb-2 text-sm space-x-12 md:space-x-24 justify-between border-b border-gray-200">
          <p>
              Embedded form
          </p>
          <div class="flex items-end text-xs">
              13
              <span class="flex items-center">
                  <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                      </path>
                  </svg>
                  12%
              </span>
          </div>
      </div>
      <div class="flex items-center text-sm space-x-12 md:space-x-24 justify-between">
          <p>
              New visitor
          </p>
          <div class="flex items-end text-xs">
              45
              <span class="flex items-center">
                  <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                      </path>
                  </svg>
                  41%
              </span>
          </div>
      </div>
  </div>
</div>


<div class="shadow-lg rounded-2xl bg-white dark:bg-gray-700 w-full">
  <p class="font-bold text-md p-4 text-black dark:text-white">
      My Tasks
      <span class="text-sm text-gray-500 dark:text-gray-300 dark:text-white ml-2">
          (05)
      </span>
  </p>
  <ul>
      <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
          <div class="flex items-center justify-start text-sm">
              <span class="mx-4">
                  01
              </span>
              <span>
                  Create wireframe
              </span>
          </div>
          <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
              <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
              </path>
              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
              </path>
          </svg>
      </li>
      <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
          <div class="flex items-center justify-start text-sm">
              <span class="mx-4">
                  02
              </span>
              <span>
                  Dashboard design
              </span>
              <span class="lg:ml-6 ml-2 flex items-center text-gray-400 dark:text-gray-300">
                  3
                  <svg width="15" height="15" fill="currentColor" class="ml-1" viewBox="0 0 512 512">
                      <path d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2l-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29c7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1l-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160s-93.3 160-208 160z" fill="currentColor">
                      </path>
                  </svg>
              </span>
              <span class="mx-4 flex items-center text-gray-400 dark:text-gray-300">
                  3
                  <svg width="15" height="15" class="ml-1" fill="currentColor" viewBox="0 0 384 512">
                      <path d="M384 144c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 36.4 24.3 67.1 57.5 76.8c-.6 16.1-4.2 28.5-11 36.9c-15.4 19.2-49.3 22.4-85.2 25.7c-28.2 2.6-57.4 5.4-81.3 16.9v-144c32.5-10.2 56-40.5 56-76.3c0-44.2-35.8-80-80-80S0 35.8 0 80c0 35.8 23.5 66.1 56 76.3v199.3C23.5 365.9 0 396.2 0 432c0 44.2 35.8 80 80 80s80-35.8 80-80c0-34-21.2-63.1-51.2-74.6c3.1-5.2 7.8-9.8 14.9-13.4c16.2-8.2 40.4-10.4 66.1-12.8c42.2-3.9 90-8.4 118.2-43.4c14-17.4 21.1-39.8 21.6-67.9c31.6-10.8 54.4-40.7 54.4-75.9zM80 64c8.8 0 16 7.2 16 16s-7.2 16-16 16s-16-7.2-16-16s7.2-16 16-16zm0 384c-8.8 0-16-7.2-16-16s7.2-16 16-16s16 7.2 16 16s-7.2 16-16 16zm224-320c8.8 0 16 7.2 16 16s-7.2 16-16 16s-16-7.2-16-16s7.2-16 16-16z" fill="currentColor">
                      </path>
                  </svg>
              </span>
          </div>
          <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
              <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
              </path>
              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
              </path>
          </svg>
      </li>
      <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
          <div class="flex items-center justify-start text-sm">
              <span class="mx-4">
                  03
              </span>
              <span>
                  Components card
              </span>
              <span class="lg:ml-6 ml-2 flex items-center text-gray-400 dark:text-gray-300">
                  3
                  <svg width="15" height="15" fill="currentColor" class="ml-1" viewBox="0 0 512 512">
                      <path d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2l-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29c7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1l-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160s-93.3 160-208 160z" fill="currentColor">
                      </path>
                  </svg>
              </span>
          </div>
          <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
              <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
              </path>
              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
              </path>
          </svg>
      </li>
      <li class="flex items-center text-gray-400 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
          <div class="flex items-center justify-start text-sm">
              <span class="mx-4">
                  04
              </span>
              <span class="line-through">
                  Google logo design
              </span>
          </div>
          <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">
              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">
              </path>
          </svg>
      </li>
      <li class="flex items-center text-gray-400  justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
          <div class="flex items-center justify-start text-sm">
              <span class="mx-4">
                  05
              </span>
              <span class="line-through">
                  Header navigation
              </span>
          </div>
          <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">
              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">
              </path>
          </svg>
      </li>
      <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
          <div class="flex items-center justify-start text-sm">
              <span class="mx-4">
                  06
              </span>
              <span>
                  International
              </span>
              <span class="lg:ml-6 ml-2 flex items-center text-gray-400 dark:text-gray-300">
                  3
                  <svg width="15" height="15" fill="currentColor" class="ml-1" viewBox="0 0 512 512">
                      <path d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2l-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29c7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1l-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160s-93.3 160-208 160z" fill="currentColor">
                      </path>
                  </svg>
              </span>
              <span class="mx-4 flex items-center text-gray-400 dark:text-gray-300">
                  3
                  <svg width="15" height="15" class="ml-1" fill="currentColor" viewBox="0 0 384 512">
                      <path d="M384 144c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 36.4 24.3 67.1 57.5 76.8c-.6 16.1-4.2 28.5-11 36.9c-15.4 19.2-49.3 22.4-85.2 25.7c-28.2 2.6-57.4 5.4-81.3 16.9v-144c32.5-10.2 56-40.5 56-76.3c0-44.2-35.8-80-80-80S0 35.8 0 80c0 35.8 23.5 66.1 56 76.3v199.3C23.5 365.9 0 396.2 0 432c0 44.2 35.8 80 80 80s80-35.8 80-80c0-34-21.2-63.1-51.2-74.6c3.1-5.2 7.8-9.8 14.9-13.4c16.2-8.2 40.4-10.4 66.1-12.8c42.2-3.9 90-8.4 118.2-43.4c14-17.4 21.1-39.8 21.6-67.9c31.6-10.8 54.4-40.7 54.4-75.9zM80 64c8.8 0 16 7.2 16 16s-7.2 16-16 16s-16-7.2-16-16s7.2-16 16-16zm0 384c-8.8 0-16-7.2-16-16s7.2-16 16-16s16 7.2 16 16s-7.2 16-16 16zm224-320c8.8 0 16 7.2 16 16s-7.2 16-16 16s-16-7.2-16-16s7.2-16 16-16z" fill="currentColor">
                      </path>
                  </svg>
              </span>
          </div>
          <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
              <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
              </path>
              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
              </path>
          </svg>
      </li>
      <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3">
          <div class="flex items-center justify-start text-sm">
              <span class="mx-4">
                  07
              </span>
              <span>
                  Production data
              </span>
          </div>
          <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
              <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
              </path>
              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
              </path>
          </svg>
      </li>
  </ul>
</div>

<div class="md:p-8 p-6 bg-white shadow-xl rounded-lg flex justify-between dark:bg-gray-800 md:items-center md:flex-row flex-col gap-12">
  <div>
      <span class="text-bold text-gray-700 dark:text-gray-400 block">
          Total Cases
      </span>
      <span class="text-yellow-500 text-4xl md:text-5xl mt-2 font-black block">
          75,858,724
      </span>
  </div>
  <div class="self-end">
      <div class="md:text-right text-left md:block">
          <p class="text-xl md:mb-2 mb-0 dark:text-gray-100 flex items-center increase">
              <svg width="20" height="20" fill="currentColor" class="h-6 w-6 text-red-500 mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                  <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                  </path>
              </svg>
              1.2% increase
          </p>
      </div>
      <p class="text-lg text-gray-600 md:text-right text-left dark:text-gray-400 md:block inline-block md:mb-0">
          from yesterday (+906,503)
      </p>
  </div>
</div>
