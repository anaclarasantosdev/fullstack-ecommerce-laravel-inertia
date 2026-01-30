import { Head } from '@inertiajs/react';
import Header from '@/Components/Header';
import { PageProps } from '../../../vendor/laravel/breeze/stubs/inertia-vue-ts/resources/js/types/index';


export default function Welcome({ auth }:PageProps){
    
    return (
        <>
            <Head title="Welcome" />
            <div >
                <div >
                    <div>
                        <Header auth={auth} />
                        <main>
                            <h1>main vazia</h1>
                        </main>
                    </div>
                </div>
            </div>
        </>
    );
}
