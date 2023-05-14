<style>
    .tabs {
        /*border: 4px solid #624bff;*/
    }

    .tabs__list {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: max-content;
        /*background: #b2c2f3;*/
    }

    .tabs__button {
        border: none;
        padding: 8px 16px;
        font-size: inherit;
        font-family: inherit;
        background: transparent;
    }

    .tabs__button[aria-selected=true] {
        background: #624bff;
        color: #ffffff;
    }

    .tabs__container {
        padding: 16px;
    }
</style>
<div class="tabs" data-tabs>
    <div class="tabs__list" data-list>
        @foreach($item as $lang)
            <button class="tabs__button" data-target="tab{{ $loop->iteration }}">{{ $lang->language->name }}</button>
        @endforeach
    </div>
    @php
        $cnt_langs = $global_langs->count();
        $langs = $item->{$column['origin_name']};
    @endphp
    @foreach($global_langs as $global_lang)

        <div class="tabs__container" data-tab="tab{{ $num_tab }}">
            @foreach($global_columns as $column)
                @if($column['is_show_single'] and isset($lang->{$column['origin_name']}))
                        <?php $ex_fields[] = $column; ?>
                        <?php $lang_name = 'langs[' . $global_langs[$num_tab - 1]->id . '][' . $column['origin_name'] . ']'; ?>
                    <div class="form-group row mb-4">
                        <label for="{{ $lang_name }}"
                               class="col-sm-2 col-form-label">{!! $column['show_name'] !!}</label>
                        <div class="col-sm-10">
                            @includeIf('admin.parts.form.type.' . $column['type'],
                                    [
                                        'item' => $lang,
                                        'lang_name' => $lang_name
                                    ])
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    @endforeach
</div>

<script>
    class Tabs {
        constructor(root) {
            this.root = root;
            this.list = this.root.querySelector(':scope > [data-list]');
            this.buttons = new Map([...this.list.querySelectorAll(':scope > [data-target]')]
                .map(entry => [
                    entry.dataset.target,
                    entry,
                ])
            );
            this.containers = new Map([...this.root.querySelectorAll(':scope > [data-tab]')]
                .map(entry => [entry.dataset.tab, entry])
            );
            this.salt = Math.random().toString(36).slice(2);
            this.current = null;
            this.active = null;
        }

        select(name) {
            const keys = [...this.buttons.keys()];

            for (let [key, button] of this.buttons.entries()) {
                button.setAttribute('aria-selected', key === name);
            }

            for (let [key, container] of this.containers.entries()) {
                if (key === name) {
                    container.removeAttribute('hidden');
                } else {
                    container.setAttribute('hidden', true);
                }
            }

            this.active = keys.indexOf(name);
        }

        init() {
            const keys = [...this.buttons.keys()];

            this.list.setAttribute('role', 'tablist');

            this.list.addEventListener('keydown', event => {
                if (event.code === 'Home') {
                    event.preventDefault();

                    this.buttons.get(keys[0]).focus();
                }

                if (event.code === 'End') {
                    event.preventDefault();

                    this.buttons.get(keys[keys.length - 1]).focus();
                }

                if (event.code === 'ArrowLeft') {
                    event.preventDefault();

                    this.buttons.get(keys[Math.max(0, this.current - 1)]).focus();
                }

                if (event.code === 'ArrowRight') {
                    event.preventDefault();

                    this.buttons.get(keys[Math.min(keys.length - 1, this.current + 1)]).focus();
                }
            });

            for (let [key, button] of this.buttons.entries()) {
                button.setAttribute('tabindex', '0');
                button.setAttribute('id', `button_${this.salt}_${key}`);
                button.setAttribute('role', 'tab');
                button.setAttribute('aria-controls', `container_${this.salt}_${key}`);

                button.addEventListener('click', event => {
                    event.preventDefault();

                    this.select(key);
                });

                button.addEventListener('focus', event => {
                    this.current = keys.indexOf(key);
                });

                button.addEventListener('keypress', event => {
                    if (event.code === 'Enter' || event.code === 'Space') {
                        event.preventDefault();

                        this.select(key);
                    }
                });
            }

            for (let [key, container] of this.containers.entries()) {
                container.setAttribute('id', `container_${this.salt}_${key}`);
                container.setAttribute('role', 'tabpanel');
                container.setAttribute('aria-labelledby', `button_${this.salt}_${key}`);
            }

            this.select(keys[0]);
        }

        static create(element) {
            const instance = new Tabs(element);
            instance.init();

            return instance;
        }
    }

    const containers = document.querySelectorAll('[data-tabs]');

    for (let container of containers) {
        Tabs.create(container);
        // const tabs = Tabs.create(container);
        // console.log(tabs)
    }
</script>
