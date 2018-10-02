{foreach $estados as $e}

    .{$e->className} {
        background-color: {$e->color};
    }
{/foreach}

	.disponible{
		background-color: #95D5FF;
	}
	.nodisponible{
		background-color: #BFBFBF;
	}
	.ocupado{
		background-color: #FF9797;
	}