@preg_match('/<(p|div)[^>]*>(.*?)<\/\1>/is', $data->article, $matches)
@php
    $firstBlock = $matches[2] ?? $data->article;
    $cleanText = strip_tags($firstBlock);

    // Hapus &nbsp; dan decode entity lain seperti &amp;, &quot;, dll
    $cleanText = str_replace('&nbsp;', ' ', $cleanText);
    $cleanText = html_entity_decode($cleanText, ENT_QUOTES | ENT_HTML5);

    $sentence = Str::limit(trim($cleanText), 155);
    
    // Cek apakah ada tabel dalam konten
    $hasTable = strpos($data->article, '<table') !== false;
@endphp

<x-layout.guest :title="$data->judul. ' - Bizlink'" :desc="$sentence" :tags="$data->articles->articletag" :category="$category">
    <div class="background w-full" style="
        @if ($template->bg_type === 'normal')
            background-color: {{ $template->bg_main_color }};
        @elseif ($template->bg_type === 'gradient')
            background: linear-gradient(to bottom, {{ $template->bg_main_color }}, {{ $template->bg_second_color }});
        @elseif ($template->bg_type === 'image')
            background-image: url('{{ asset('storage/images/template/background/'.$template->bg_image) }}');
            background-size: cover;
            background-position: center;
        @endif
    ">

        {{-- Header --}}
        @include('components.guest.header.'.$template->head_type)

        <div class="w-full pt-4 px-4 sm:pt-6 sm:px-6 pb-2 space-y-4 sm:space-y-6">
            @if ($data->articleshowgallery->isNotEmpty())
                {{-- Gallery --}}
                @include('components.guest.gallery.'. $template->gallery_type)
            @endif
            
            {{-- Description --}}
            <x-guest.description :template="$template" :data="$data"/>
            
            {{-- Video --}}
            @if ($data->articles->video_type != 'none')  
                @include('components.guest.'.$data->articles->video_type)
            @endif
        </div>

        {{-- Contact --}}
        @include('components.guest.contact.one')
    </div>

    {{-- Tombol Edit --}}
    @if (Auth::user())    
        <a href="{{$data->articles->article_type === 'spintax' ? route('article-generated.show', ['article_generated' => $data->id]) : route('article-show.show', ['article_show' => $data->id])}}" target="__blank">
            <button class="fixed top-24 right-8 bg-white text-black font-semibold hover:bg-byolink-1 hover:text-white duration-300 px-4 py-2 rounded-full">Edit</button>
        </a>
    @endif

    {{-- Tombol Download jika ada Tabel --}}
    @if ($hasTable)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

        <script>
            const secondColor = @json($template->desc_second_color); 
            const fileName = @json(Str::slug($data->judul));

            function createDownloadButton(table, index) {
                const wrapper = document.createElement('div');
                wrapper.className = 'table-download-wrapper';
                wrapper.style.position = 'absolute';
                wrapper.style.top = '-3rem';
                wrapper.style.right = '0';

                const button = document.createElement('button');
                button.className = 'export-menu-button flex items-center gap-2';
                button.style.backgroundColor = secondColor; 
                button.style.color = 'white';
                button.style.fontWeight = '600';
                button.style.transition = 'all 0.3s';
                button.style.padding = '0.5rem 1rem';
                button.style.borderRadius = '9999px';
                button.style.cursor = 'pointer';

                // Hover effect
                button.addEventListener('mouseenter', () => {
                    button.style.opacity = '0.85';
                });
                button.addEventListener('mouseleave', () => {
                    button.style.opacity = '1';
                });

                const icon = document.createElement('span');
                icon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                        viewBox="0 0 24 24" stroke-width="1.5" 
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M3 16.5v2.25A2.25 2.25 0 
                               005.25 21h13.5A2.25 2.25 0 
                               0021 18.75V16.5M7.5 10.5L12 15m0 
                               0l4.5-4.5M12 15V3" />
                    </svg>`;
                button.appendChild(icon);

                const spanText = document.createElement('span');
                spanText.className = 'download-text';
                spanText.textContent = `Download Table ${index + 1}`;
                button.appendChild(spanText);

                const menu = document.createElement('div');
                menu.className = 'export-menu hidden';
                menu.style.position = 'absolute';
                menu.style.marginTop = '0.5rem';
                menu.style.width = '10rem';
                menu.style.borderRadius = '0.375rem';
                menu.style.backgroundColor = 'white';
                menu.style.boxShadow = '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)';

                const pdfLink = document.createElement('a');
                pdfLink.href = '#';
                pdfLink.className = 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100';
                pdfLink.textContent = 'PDF';

                const excelLink = document.createElement('a');
                excelLink.href = '#';
                excelLink.className = 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100';
                excelLink.textContent = 'Excel';

                menu.appendChild(pdfLink);
                menu.appendChild(excelLink);
                wrapper.appendChild(button);
                wrapper.appendChild(menu);

                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    menu.classList.toggle('hidden');
                });

                pdfLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF();
                    pdf.autoTable({
                        html: table,
                        theme: 'grid',
                        styles: { lineWidth: 0.3, lineColor: [0, 0, 0], fontSize: 10 },
                        headStyles: { fontStyle: 'bold', fillColor: [240, 240, 240] }
                    });
                    pdf.save(`${fileName}-table-${index + 1}.pdf`);
                    menu.classList.add('hidden');
                });

                excelLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    const wb = XLSX.utils.book_new();
                    const ws = XLSX.utils.table_to_sheet(table);
                    XLSX.utils.book_append_sheet(wb, ws, `Table ${index + 1}`);
                    XLSX.writeFile(wb, `${fileName}-table-${index + 1}.xlsx`);
                    menu.classList.add('hidden');
                });

                return wrapper;
            }

            window.addEventListener('DOMContentLoaded', () => {
                const tables = document.querySelectorAll('table');
                tables.forEach((table, index) => {
                    const container = document.createElement('div');
                    container.style.position = 'relative';
                    container.style.marginBottom = '2rem';
                    table.parentNode.insertBefore(container, table);
                    container.appendChild(table);
                    const buttonWrapper = createDownloadButton(table, index);
                    container.insertBefore(buttonWrapper, table);
                });
            });

            window.addEventListener('click', () => {
                document.querySelectorAll('.export-menu').forEach(menu => menu.classList.add('hidden'));
            });
        </script>

        <style>
            @media (max-width: 640px) {
                .export-menu-button .download-text {
                    display: none;
                }
            }
        </style>
    @endif
</x-layout.guest>