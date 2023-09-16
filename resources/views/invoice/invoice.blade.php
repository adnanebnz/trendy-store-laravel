<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gray-200 print:bg-white md:flex lg:flex xl:flex print:flex md:justify-center lg:justify-center xl:justify-center print:justify-center text-right">
    <div class="lg:w-1/12 xl:w-1/4"></div>
    <div
        class="w-full bg-white lg:w-full xl:w-2/3 lg:mt-20 lg:mb-20 lg:shadow-xl xl:mt-02 xl:mb-20 xl:shadow-xl print:transform print:scale-90">
        <header
            class="flex flex-col items-center px-8 pt-20 text-lg text-center bg-white border-t-8 border-red-600 md:block lg:block xl:block print:block md:items-start lg:items-start xl:items-start print:items-start md:text-left lg:text-left xl:text-left print:text-left print:pt-8 print:px-2 md:relative lg:relative xl:relative print:relative">
            <img class="w-1/6 h-auto md:w-1/4 lg:ml-12 xl:ml-12 print:px-0 print:py-0"
                src="{{ asset('images/LOGO-trendy.png') }}" alt="Logo">
            <div
                class="flex flex-row mt-12 mb-2 ml-0 text-2xl font-bold md:text-3xl lg:text-4xl xl:text-4xl print:text-2xl lg:ml-12 xl:ml-12">
                <div class="text-green-700">
                    <span class="mr-4 text-sm"></span>#
                </div>
                <span id="invoice_id" class="text-gray-500">0196023</span>
                &nbsp;
                فاتورة

            </div>
            <div class="flex flex-col lg:ml-12 xl:ml-12 print:text-sm">
                <span>Issue date: 2020.09.06</span>
                <span>Paid date: 2020.09.07</span>
                <span>Due date: 2020.10.06</span>
            </div>
            <div
                class="px-8 py-2 mt-16 text-3xl font-bold text-red-600 border-4 border-red-600 border-dotted md:absolute md:right-0 md:top-0 md:mr-12 lg:absolute lg:right-0 lg:top-0 xl:absolute xl:right-0 xl:top-0 print:absolute print:right-0 print:top-0 lg:mr-20 xl:mr-20 print:mr-2 print:mt-8">
                غير المدفوعة</div>
            <contract
                class="flex flex-col m-12 text-center lg:m-12 md:flex-none md:text-left md:relative md:m-0 md:mt-16 lg:flex-none lg:text-left lg:relative xl:flex-none xl:text-left xl:relative print:flex-none print:text-left print:relative print:m-0 print:mt-6 print:text-sm">
                <span class="font-extrabold md:hidden lg:hidden xl:hidden print:hidden">من</span>
                <from class="flex flex-col">
                    <span id="company-name" class="font-medium">BroHosting</span>

                    <div class="flex-row">
                        <span id="c-city">New York</span>,
                        <span id="c-postal">NY 10023</span>
                    </div>
                    <span id="company-address">98-2 W 67th St</span>
                    <span id="company-phone">+12124567777</span>
                    <span id="company-mail">info@brohosting.us</span>
                </from>
                <span class="mt-12 font-extrabold md:hidden lg:hidden xl:hidden print:hidden">الى</span>
                <to
                    class="flex flex-col md:absolute md:right-0 md:text-right lg:absolute lg:right-0 lg:text-right print:absolute print:right-0 print:text-right">
                    <span id="person-name" class="font-medium">TrendyStore</span>

                    <div class="flex-row">
                        <span id="p-postal">13000</span>
                        <span id="p-city">Tlemcen</span>,
                    </div>
                    <span id="person-address">Ain dheb makhokh mansourah</span>
                    <span id="person-phone">+213 560690167</span>
                    <span id="person-mail">trendystore.contact@gmail.com</span>
                </to>
            </contract>
        </header>
        <hr class="border-gray-300 md:mt-8 print:hidden">
        <content>
            <div id="content" class="flex justify-center md:p-8 lg:p-20 xl:p-20 print:p-2">
                <table class="w-full text-left table-auto print:text-sm" id="table-items">
                    <thead>
                        <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black">
                            <th class="px-4 py-2">منتج</th>
                            <th class="px-4 py-2 text-right">الكمية</th>
                            <th class="px-4 py-2 text-right">سعر الوحدة</th>
                            <th class="px-4 py-2 text-right">المجموع الفرعي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border">Shared Hosting - Simple Plan (Monthly)</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">1</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">300 دج</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">300 دج</td>
                        </tr>
                        <tr class="bg-gray-100 print:bg-gray-100">
                            <td class="px-4 py-2 border">Domain Registration - coolstory.bro - (100% Free for First
                                Year)</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">1</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">دج 12</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">دج 0</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border">
                                Dedicated Server - Eco Boost
                                <div class="flex flex-col ml-4 text-xs print:hidden">
                                    <span class="flex items-center">Intel® Xeon® Processor E5-1607 v3</span>
                                    <span class="uppercase">32GB DDR4 RAM</span>
                                    <span>1TB NVMe / Raid 1+0</span>
                                    <span>1Gbps Network + CloudFlare DDoS protection</span>
                                </div>
                            </td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">1</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">دج 214</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">دج 214</td>
                        </tr>
                        <tr class="bg-gray-100 print:bg-gray-100">
                            <td class="px-4 py-2 border ">
                                Dedicated Server - V8 Turbo
                                <div class="flex flex-col ml-4 text-xs print:hidden">
                                    <span class="flex items-center">AMD EPYC™ 7702P</span>
                                    <span class="uppercase">128GB DDR4 RAM</span>
                                    <span>512GB NVMe / Raid 5</span>
                                    <span>100Mbit Network + CloudFlare DDoS protection</span>
                                </div>
                            </td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">1</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">دج 322</td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">دج 322</td>
                        </tr>
                        <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black">
                            <td class="invisible"></td>
                            <td class="invisible"></td>

                        </tr>
                        <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black">
                            <td class="invisible"></td>
                            <td class="invisible"></td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">دج 200</td>
                            <td class="px-4 py-2 text-right border">شحن</td>
                        </tr>
                        <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black">
                            <td class="invisible"></td>
                            <td class="invisible"></td>
                            <td class="px-4 py-2 text-right border tabular-nums slashed-zero">300 دج</td>
                            <td class="px-4 py-2 font-extrabold text-right border">المجموع</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </content>
        <footer
            class="flex flex-col items-center justify-center pb-20 leading-loose text-white bg-gray-700 print:bg-white print:pb-0">
            <span class="mt-4 text-xs print:mt-0">تم إنشاء الفاتورة بتاريخ
                {{ \Carbon\Carbon::now()->format('d-m-Y') }}</span>
            <span class="mt-4 text-base print:text-xs">© {{ \Carbon\Carbon::now()->year }} TrendyStore كل الحقوق
                محفوظة</span>
            <span class="print:text-xs">Algerie - Tlemcen, 13000</span>
        </footer>
    </div>
    <div class="lg:w-1/12 xl:w-1/4"></div>
</body>

</html>
