import { Head, Link } from '@inertiajs/react';
import { PageProps } from '../../../vendor/laravel/breeze/stubs/inertia-vue-ts/resources/js/types/index';


export default function Welcome({auth}:PageProps){
    
    return (
        <>
            <Head title="Welcome" />
            <div >
                <div >
                    <div>
                        <header className='flex justify-around items-center' >
                            <h1>Header</h1>
                            {auth.user ? (
                                <>  
                                    <Link href={route("users.index")}>Usuarios</Link>
                                    <Link href={"dashboard"}>dashboard</Link>
                                </>
                              
                            ): (
                                <> 
                                    <Link href={route("register")}>register</Link>
                                    <Link href={route("login")}>login</Link>
                                </>
                               
                            )}
                        </header>
                        <main>
                            <h1>main vazia</h1>
                        </main>
                    </div>
                </div>
            </div>
        </>
    );
}
