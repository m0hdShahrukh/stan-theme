<?php get_header(); ?>

<div class="min-h-[70vh] flex items-center justify-center py-24">
    <div class="container mx-auto px-6 text-center">
        <!-- Animated 404 -->
        <div class="relative mb-8">
            <div class="text-9xl font-bold text-slate-900 opacity-10">404</div>
            <div class="absolute inset-0 flex items-center justify-center">
                <svg class="w-48 h-48 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
        
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Page Not Found</h1>
        <p class="text-slate-600 text-lg mb-10 max-w-2xl mx-auto">
            The page you're looking for doesn't exist or has been moved. 
            Let's get you back on track.
        </p>
        
        <!-- Search Form -->
        <div class="max-w-md mx-auto mb-10">
            <form role="search" method="get" action="<?php echo home_url('/'); ?>" class="relative">
                <input type="search" 
                       name="s" 
                       placeholder="Search our website..." 
                       class="w-full bg-slate-100 border border-slate-200 rounded-full py-4 pl-6 pr-12 text-slate-900 focus:outline-none focus:border-brand-orange focus:ring-2 focus:ring-brand-orange/20"
                       value="<?php echo get_search_query(); ?>">
                <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-brand-orange">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>
        </div>
        
        <!-- Quick Links -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-12">
            <a href="<?php echo home_url(); ?>" 
               class="bg-white border border-slate-200 rounded-xl p-6 text-center hover:border-brand-orange hover:shadow-md transition-all group">
                <div class="w-12 h-12 bg-brand-orange/10 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:bg-brand-orange/20 transition-colors">
                    <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-900 mb-2">Home Page</h3>
                <p class="text-slate-500 text-sm">Return to our homepage</p>
            </a>
            
            <a href="/services" 
               class="bg-white border border-slate-200 rounded-xl p-6 text-center hover:border-brand-orange hover:shadow-md transition-all group">
                <div class="w-12 h-12 bg-brand-orange/10 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:bg-brand-orange/20 transition-colors">
                    <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-900 mb-2">Our Services</h3>
                <p class="text-slate-500 text-sm">Explore what we offer</p>
            </a>
            
            <a href="/contact" 
               class="bg-white border border-slate-200 rounded-xl p-6 text-center hover:border-brand-orange hover:shadow-md transition-all group">
                <div class="w-12 h-12 bg-brand-orange/10 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:bg-brand-orange/20 transition-colors">
                    <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-900 mb-2">Contact Us</h3>
                <p class="text-slate-500 text-sm">Get in touch for help</p>
            </a>
        </div>
        
        <!-- Back to Home Button -->
        <a href="<?php echo home_url(); ?>" 
           class="inline-flex items-center gap-2 bg-brand-orange text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-brand-orangeHover transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Back to Homepage
        </a>
    </div>
</div>

<?php get_footer(); ?>