import sys
import json

# Ambil file json payload dari Laravel
file_path = sys.argv[1]

with open(file_path, "r") as file:
    data = json.load(file)

selected_gejala = data["gejala"]
rules = data["rules"]
penyakit = data["penyakit"]

# Cari penyakit yang semua rule gejala terpenuhi
$hasil = [];

foreach ($rules as $rule) {
    $ruleSymptoms = explode(',', $rule->gejala_kode);
    $match = count(array_intersect($selectedSymptoms, $ruleSymptoms));
    $total = count($ruleSymptoms);

    $percentage = ($match / $total) * 100;

    if ($percentage >= 50) {   // minimal 50% cocok
        $hasil[] = [
            'penyakit' => $rule->penyakit->nama_penyakit,
            'persen'   => round($percentage, 2),
        ];
    }
}


# Print JSON hasil untuk Laravel
print(json.dumps({
    "status": True,
    "hasil": hasil
}))
