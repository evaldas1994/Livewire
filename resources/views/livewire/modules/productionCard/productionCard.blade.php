<div>
    @if($page ==='index')
        <livewire:modules.production-card.index :productionCard="$productionCard"/>
    @endif

    @if($page ==='create')
        <livewire:modules.production-card.create :tab="$tab" :productionCard="$productionCard"/>
    @endif

    @if($page ==='edit' && $productionCard !== null)
        <livewire:modules.production-card.edit :tab="$tab" :productionCard="$productionCard"/>
    @endif

    @if($showPopupCreate)
        <livewire:modules.production-card-component.create :tab="$tab" :productionCard="$productionCard"/>
    @endif

    @if($showPopupEdit == true)
        <livewire:modules.production-card-component.edit :tab="$tab" :productionCard="$productionCard" :productionCardComponent="$productionCardComponent"/>
    @endif

    @if($showFStockid == true)
        <livewire:modules.stock.stock :tab="$tab" :oldData="$pageData" />
    @endif
</div>
