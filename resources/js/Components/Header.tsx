import { Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import { useState, SVGAttributes } from 'react';
import Dashboard from '../Pages/Dashboard';

export default function Header({ auth }: { auth: PageProps['auth'] }) {

    const [isOpen, setIsOpen] = useState(false);

    return (
        <header className='bg-white shadow-sm py-4 px-6 flex justify-between items-center relative'>
            <Link href={'/'} className='text-2xl font-bold text-indigo-600'>Minha Loja</Link>
            <nav className='flex items-center'>
                {/* Links Desktop - Ocultos no Mobile */}
                <div className='hidden sm:flex gap-6 items-center'>
                    <Link className='hover:text-indigo-600' href={'/'}>Home</Link>
                    <Link className='hover:text-indigo-600' href='#'>Produtos</Link>
                    
                    {auth.user ? (
                        <Link href={route('dashboard')} className='text-gray-700 font-medium'>
                            Olá, {auth.user.name}
                        </Link>
                    ) : (
                        <div className='flex gap-4'>
                            <Link href={route('login')} className='bg-indigo-600 text-white px-4 py-2 rounded-lg'>Entrar</Link>
                            <Link href={route('register')} className='border border-indigo-600 text-indigo-600 px-4 py-2 rounded-lg'>Criar Conta</Link>
                        </div>
                    )}
                </div>

                {/* Lógica Mobile (Botão Hambúrguer) */}
                {auth.user && (
                    <div className='sm:hidden'>
                        <button 
                            onClick={() => setIsOpen(!isOpen)} 
                            className='p-2 rounded-md text-gray-500 hover:bg-gray-100 z-50 relative'
                        >
                            <svg className='h-7 w-7' stroke='currentColor' fill='none' viewBox='0 0 24 24'>
                                <path 
                                    className={!isOpen ? 'inline-flex' : 'hidden'} 
                                    strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" 
                                    d='M4 6h16M4 12h16M4 18h16' 
                                />
                                <path 
                                    className={isOpen ? 'inline-flex' : 'hidden'} 
                                    strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" 
                                    d='M6 18L18 6M6 6l12 12' 
                                />
                            </svg>
                        </button>

                        {/* Overlay (Fundo escuro para fechar ao clicar fora) */}
                        {isOpen && (
                            <div 
                                className="fixed inset-0 bg-black/30 z-40" 
                                onClick={() => setIsOpen(false)}
                            />
                        )}

                        {/* Menu Lateral Direito */}
                        <div className={`
                            fixed top-0 right-0 h-full w-[280px] bg-white shadow-2xl z-40
                            transform transition-transform duration-300 ease-in-out
                            ${isOpen ? 'translate-x-0' : 'translate-x-full'}
                            flex flex-col pt-20 px-6
                        `}>
                            <div className='flex flex-col space-y-4'>
                                <p className="text-xs font-bold text-gray-400 uppercase">Minha Conta</p>
                                <Link href={route('dashboard')} className='text-lg text-gray-800 font-semibold'>
                                    Olá, {auth.user.name}
                                </Link>
                                
                                <hr />
                                
                                <Link href={'/'} className='py-2 text-gray-600 hover:text-indigo-600'>Home</Link>
                                <Link href='#' className='py-2 text-gray-600 hover:text-indigo-600'>Produtos</Link>
                                <Link href={route('dashboard')} className='py-2 text-gray-600 hover:text-indigo-600'>Dashboard</Link>
                                
                                <div className="pt-6">
                                    <Link 
                                        href={route('logout')} 
                                        method='post' 
                                        as='button' 
                                        className='w-full text-left text-red-500 font-medium'
                                    >
                                        Sair da Loja
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                )}

                {/* Botões de Login Mobile (Caso não esteja logado) */}
                {!auth.user && (
                    <div className='sm:hidden flex gap-2'>
                        <Link href={route('login')} className='text-sm bg-indigo-600 text-white px-3 py-1.5 rounded-lg'>Entrar</Link>
                    </div>
                )}
            </nav>
        </header>
    );
}
