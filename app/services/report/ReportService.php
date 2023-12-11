<?php

class ReportService extends DBService {
    public function __construct()
    {
        parent::__construct('tb_report');
    }

    public static function getInstance(): self
    {
        return parent::getInstance();
    }

    public function getAllReport(): array {
        $rawReports = $this->getAll();
        $reports = [];

        if ($rawReports) {
            foreach ($rawReports as $rawReport) {
                $reports[] = ReportModel::fromStdClass($rawReport);
            }
        }

        return $reports;
    }
    public function getSingleReport($where): ReportModel | null
    {
        $rawReport = $this->getSingle($where);
        if ($rawReport) {
            $report = ReportModel::fromStdClass($rawReport);
            return $report;
        }

        return null;
    }

    public function getManyReport($where): array
    {
        $rawReports = $this->getDB()->findMany($this->getTable(), $where, 'id_report', 'DESC');
        $reports = [];

        if ($rawReports) {
            foreach ($rawReports as $rawReport) {
                $reports[] = ReportModel::fromStdClass($rawReport);
            }
        }

        return $reports;
    }

    public function addNewReport(
        $idCodeOfConduct,
        $title,
        $nidnDosen,
        $nimMahasiswa,
        $content,
        $status,
        $imagePath,
        $location
    ): string {
        $data = [
            'id_code_of_conduct' => $idCodeOfConduct,
            'title' => $title,
            'nidn_dosen' => $nidnDosen,
            'nim_mahasiswa' => $nimMahasiswa,
            'content' => $content,
            'status' => $status,
            'image_path' => $imagePath,
            'location' => $location
        ];

        return $this->getDB()->insert($this->getTable(), $data);
    }
}