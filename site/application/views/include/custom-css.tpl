<style type="text/css">
	body #header-container{
		{if $federacionActual->fondo}
		background-image: url({{ImagenManager::getInstance()->getUrl($federacionActual->fondo,'full')}}) !important;
		background-size: cover !important;
		background-position: top center;
		{/if}
	}
</style>