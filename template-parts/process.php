<?php
// Process steps - can be customized via theme mods or ACF
$process_steps = [
    [
        'title' => 'Discovery',
        'description' => 'We analyze your clients\' existing setup, keywords, and competitors to build a roadmap.',
    ],
    [
        'title' => 'Execution',
        'description' => 'Our team handles everything - content, links, technical fixes - while you sit back and relax.',
    ],
    [
        'title' => 'Scale',
        'description' => 'Consistent results means steady growth that builds your reputation and ARR.',
    ],
];

// Get custom steps from theme mods if available
for ($i = 1; $i <= 3; $i++) {
    $step_title = get_theme_mod("process_step_{$i}_title", '');
    $step_desc = get_theme_mod("process_step_{$i}_description", '');
    
    if ($step_title) {
        $process_steps[$i-1]['title'] = $step_title;
    }
    if ($step_desc) {
        $process_steps[$i-1]['description'] = $step_desc;
    }
}
?>

<section class="py-24">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-16">
            Simple Process.<br>
            <span class="text-slate-500">Powerful Results.</span>
        </h2>

        <div class="grid md:grid-cols-3 gap-12">
            <?php foreach ($process_steps as $index => $step) : 
                $step_number = $index + 1;
            ?>
            <div class="relative group">
                <div class="text-8xl font-bold text-slate-200 absolute -top-10 z-0 group-hover:text-slate-300 transition-colors">
                    <?php echo str_pad($step_number, 2, '0', STR_PAD_LEFT); ?>
                </div>
                <div class="relative z-10 pt-8 mt-[80px]">
                    <h3 class="text-xl font-bold text-slate-900 mb-3 transition-colors">
                        <?php echo $step['title']; ?>
                    </h3>
                    <p class="text-sm text-slate-500 leading-relaxed group-hover:text-slate-600 transition-colors">
                        <?php echo $step['description']; ?>
                    </p>
                </div>
                
                <!-- Connector line for desktop -->
                <?php if ($step_number < 4) : ?>
                <div class="hidden md:block absolute top-[4em] -left-4 right-0 w-full">
                    <div class="h-px bg-slate-200 group-hover:bg-slate-300 transition-colors"></div>
                    <div class="absolute right-0 top-1/2 transform -translate-y-1/2">
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Mobile step indicators -->
        <div class="md:hidden flex justify-center mt-8 space-x-4">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
            <div class="w-3 h-3 rounded-full bg-slate-300"></div>
            <?php endfor; ?>
        </div>
    </div>
</section>