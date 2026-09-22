<x-layouts.base>
    <section class="bg-caa-forest text-white">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-20 lg:grid-cols-[0.9fr_1.1fr] lg:px-8 lg:py-28">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-green-200">About</p>
                <h1 class="mt-5 max-w-4xl text-5xl font-semibold leading-tight tracking-tight sm:text-6xl">Christian Ambulance Association</h1>
            </div>
            <img src="{{ asset('images/about/mission.jpg') }}" alt="Ambulance worker standing beside an emergency vehicle" class="h-full max-h-[30rem] min-h-72 w-full rounded-[2rem] object-cover shadow-2xl ring-1 ring-white/20">
        </div>
    </section>

    <section class="bg-caa-cream">
        <div class="mx-auto grid max-w-7xl gap-12 px-6 py-20 lg:grid-cols-[1.15fr_0.85fr] lg:items-start lg:px-8 lg:py-28">
            <div class="space-y-8 text-lg leading-8 text-slate-700">
                <p>We began in 2017, having identified that there was nothing already in place to bring this community together and provide support. Originally known as the Christian Ambulance Network, we changed to an ‘Association’ as our aims became more established and we are delighted to have become a charity in 2020.</p>

                <p>Our aim is to support staff with a focus on the Christian faith and those issues impacting people of faith, and also to increase awareness and improve better understanding of the Christian faith. We believe that supporting people of faith and raising awareness within the workplace will improve patient care and experience in the communities we serve. We also believe that by tackling faith-based inequality and discrimination our members can be properly supported in their own work settings. The CAA works with Christians, enabling members to make a positive contribution to the work environment, other employees, and their communities.</p>

                <p>We also want to provide an interface between Christians and workplaces facilitating increased understanding, and engagement between staff of the Christian faith and the wider staff group.</p>

                <p>The CAA is open to all who identify themselves as Christian, supporting the aims of the CAA. We are not primarily an evangelistic organisation but we do accept and encourage sharing of faith by our members. Our intention is to support our members so they will build respect for the gospel message and positive relationships which provide positive opportunities for sharing. We see ourselves as a key part of equality, diversity and inclusion (EDI) in the ambulance services. We want Christians to feel able to live out their faith in their work. We embrace the positive approach in health services to multi-faith networks and we also believe it is important that Christians are supported in having their own faith identity as Christians, distinct from other faith groups.</p>
            </div>
            <aside class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-black/5 lg:sticky lg:top-8">
                <img src="{{ asset('images/about/caa-icon.png') }}" alt="Christian Ambulance Association cross logo" class="mx-auto h-48 w-48 object-contain">
                <p class="mt-8 text-center text-sm font-semibold uppercase tracking-[0.2em] text-caa-green">Christian Ambulance Association</p>
            </aside>
        </div>
    </section>
</x-layouts.base>
