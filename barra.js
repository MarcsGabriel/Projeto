function toggleSubmenu(id) {
    const subMenus = ['cadastro', 'estoque', 'fornecimento', 'estatisticas'];
    subMenus.forEach(menu => {
        const element = document.getElementById(`${menu}-sub-menu`);
        if (menu === id) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    });
}
document.getElementById('sair').addEventListener('click', () => {
    alert('Você saiu do sistema!');
});